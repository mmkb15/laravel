import { useContext, useState } from 'react';
import { PatternFormat } from 'react-number-format';
import { DrawerContext } from 'contexts/drawer/drawer.provider';
import { Scrollbar } from 'components/scrollbar';
import ArrowLeft from 'assets/icons/arrow-left';
import Input from 'components/input';
import Button from 'components/button';
import { useCart } from 'contexts/cart/cart.provider';
import Textarea from 'components/textarea';
import OrderSubmit from './order-submit';
import { API_URL, getCsrfHeaders } from 'helpers/api';
import {
  InputBase,
  TextBoxCommonBase,
  TextBoxEnable,
} from 'components/utils/theme';
const initialState = {
  phone_number: '',
  name: '',
  email: '',
  address: '',
  postal_code: '',
  suite: '',
};

export default function Checkout() {
  const { dispatch } = useContext(DrawerContext);
  const [formData, setFormData] = useState(initialState);
  const [success, setSuccess] = useState(false);
  const [loading, setLoading] = useState(false);
  const [fieldErrors, setFieldErrors] = useState<Record<string, string>>({});
  const [submitError, setSubmitError] = useState('');
  const { items, calculatePrice, clearCart } = useCart();

  const hideCheckout = () => {
    dispatch({
      type: 'TOGGLE_CHECKOUT_VIEW',
      payload: {
        showCheckout: false,
      },
    });
  };

  const submitOrder = async () => {
    const { name, email, address, postal_code, suite, phone_number } = formData;
    if (loading) {
      return;
    }

    const validationErrors: Record<string, string> = {};
    if (phone_number.replace(/\D/g, '').length < 11) {
      validationErrors.phone_number = 'Enter a complete phone number';
    }
    if (!name.trim()) {
      validationErrors.name = 'Name is required';
    }
    if (!address.trim()) {
      validationErrors.address = 'Shipping address is required';
    }

    setFieldErrors(validationErrors);
    setSubmitError('');
    if (Object.keys(validationErrors).length > 0) {
      return;
    }

    setLoading(true);

    try {
      const csrfHeaders = await getCsrfHeaders();
      const res = await fetch(`${API_URL}/orders`, {
        method: 'POST',
        credentials: 'include',
        headers: {
          'Content-Type': 'application/json',
          Accept: 'application/json',
          ...csrfHeaders,
        },
        body: JSON.stringify({
          items: items.map((i) => ({ id: i.id, quantity: i.quantity })),
          shipping_name: name.trim(),
          shipping_phone: phone_number,
          shipping_address: [address, suite, postal_code]
            .map((part) => part.trim())
            .filter(Boolean)
            .join(', '),
          customer_email: email.trim() || null,
        }),
      });
      const responseBody = await res.json();

      if (!res.ok) {
        const apiErrors = responseBody.errors ?? {};
        const apiFieldErrors: Record<string, string> = {};
        const fieldNames: Record<string, string> = {
          shipping_name: 'name',
          shipping_phone: 'phone_number',
          shipping_address: 'address',
          email: 'email',
        };

        Object.entries(apiErrors).forEach(([field, messages]) => {
          const formField = fieldNames[field];
          const message = Array.isArray(messages) ? messages[0] : undefined;
          if (formField && message) {
            apiFieldErrors[formField] = message;
          }
        });

        setFieldErrors(apiFieldErrors);
        setSubmitError(
          Object.keys(apiFieldErrors).length === 0
            ? responseBody.message ||
                'We could not place your order. Please check your cart and try again.'
            : 'Please correct the highlighted details and try again.'
        );
        return;
      }

      setSuccess(true);
      clearCart();
    } catch (error) {
      console.error('Order submission failed', error);
      setSubmitError(
        'We could not connect to the store. Please check your connection and try again.'
      );
    } finally {
      setLoading(false);
    }
  };

  const onChange = (e) => {
    const { value, name } = e.currentTarget;
    setFormData({
      ...formData,
      [name]: value,
    });
    setFieldErrors((currentErrors) => {
      const nextErrors = { ...currentErrors };
      delete nextErrors[name];
      return nextErrors;
    });
    setSubmitError('');
  };
  if (success) {
    return <OrderSubmit />;
  }

  return (
    <div className="flex flex-col w-full h-full">
      <div className="w-full flex justify-center relative px-30px py-20px">
        <button
          className="w-auto h-10 flex items-center justify-center text-gray-500 absolute top-half -mt-20px left-30px transition duration-300 focus:outline-none hover:text-gray-900"
          onClick={hideCheckout}
          aria-label="close"
        >
          <ArrowLeft />
        </button>
        <h2 className="font-bold text-24px m-0">Checkout</h2>
      </div>

      <Scrollbar className="checkout-scrollbar flex-grow">
        <div className="flex flex-col px-30px pt-20px">
          <div className="flex flex-col mb-45px">
            <span className="flex font-semibold text-gray-900 text-18px mb-15px">
              Contact Information
            </span>
            <PatternFormat
              format="+1 (###) ###-####"
              mask="_"
              placeholder="Mobile Phone Number"
              className={`${InputBase} ${TextBoxCommonBase} ${TextBoxEnable}`}
              value={formData.phone_number}
              onValueChange={({ formattedValue }) => {
                setFormData({
                  ...formData,
                  phone_number: formattedValue,
                });
                setFieldErrors((currentErrors) => {
                  const nextErrors = { ...currentErrors };
                  delete nextErrors.phone_number;
                  return nextErrors;
                });
                setSubmitError('');
              }}
              aria-invalid={Boolean(fieldErrors.phone_number)}
            />
            {fieldErrors.phone_number && (
              <p className="text-12px font-semibold text-error pt-10px pl-15px" role="alert">
                {fieldErrors.phone_number}
              </p>
            )}
            <Input
              placeholder="Email Address"
              name="email"
              value={formData.email}
              onChange={onChange}
              className="mt-15px"
              aria-invalid={Boolean(fieldErrors.email)}
            />
            {fieldErrors.email && (
              <p className="text-12px font-semibold text-error pt-10px pl-15px" role="alert">
                {fieldErrors.email}
              </p>
            )}
          </div>

          <div className="flex flex-col">
            <span className="flex font-semibold text-gray-900 text-18px mb-15px">
              Shipping Address
            </span>
            <Input
              placeholder="Name"
              className="mb-10px"
              name="name"
              value={formData.name}
              onChange={onChange}
              aria-invalid={Boolean(fieldErrors.name)}
            />
            {fieldErrors.name && (
              <p className="text-12px font-semibold text-error pb-10px pl-15px" role="alert">
                {fieldErrors.name}
              </p>
            )}

            <Textarea
              placeholder="Enter Address"
              className="mb-10px"
              name="address"
              value={formData.address}
              onChange={onChange}
              aria-invalid={Boolean(fieldErrors.address)}
            />
            {fieldErrors.address && (
              <p className="text-12px font-semibold text-error pb-10px pl-15px" role="alert">
                {fieldErrors.address}
              </p>
            )}

            <div className="flex items-center mb-10px">
              <Input
                placeholder="Postal Code"
                style={{ width: 'calc(50% - 5px)', marginRight: '5px' }}
                name="postal_code"
                value={formData.postal_code}
                onChange={onChange}
              />
              <Input
                placeholder="Apartment, Suite, etc."
                style={{ width: 'calc(50% - 5px)', marginLeft: '5px' }}
                name="suite"
                value={formData.suite}
                onChange={onChange}
              />
            </div>
          </div>
        </div>
      </Scrollbar>

      <div className="flex flex-col p-30px">
        {submitError && (
          <p className="mb-3 text-12px font-semibold text-error" role="alert">
            {submitError}
          </p>
        )}
        <Button
          className="big w-full"
          onClick={submitOrder}
          loading={loading}
          disabled={loading}
        >
          Order Now
        </Button>
      </div>
    </div>
  );
}
