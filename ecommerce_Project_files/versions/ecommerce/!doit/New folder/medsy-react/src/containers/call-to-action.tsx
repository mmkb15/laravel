import CTABlock from 'components/cta-block';
import Button from 'components/button';
import ArrowRight from 'assets/icons/arrow-right';

export default function CallToAction() {
  return (
    <CTABlock parentClassName="bg-gradient-to-r from-gray-900 to-green">
      <h3 className="font-normal text-white text-36px mb-6 text-center lg:text-left">
        Latest Gadgets,
        <br />
        <span className="font-bold">Best Prices.</span>
      </h3>

      <p className="text-white text-center lg:text-left mb-10">
        Original products with warranty and fast delivery.
      </p>

      <a href="#myScrollToElement">
        <Button variant="elevation">
          <span className="mr-2">Shop Now</span> <ArrowRight width="13px" />
        </Button>
      </a>
    </CTABlock>
  );
}
