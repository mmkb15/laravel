import CTABlock from 'components/cta-block';
import ArrowRight from 'assets/icons/arrow-right';

export default function CallToAction() {
  return (
    <CTABlock
      parentClassName="mt-8 bg-gradient-to-r from-gray-900 via-indigo-950 to-primary px-6 py-8 sm:px-10 lg:py-10"
      childClassName="lg:max-w-none"
    >
      <div className="grid w-full items-center gap-8 lg:grid-cols-[1fr_0.85fr] lg:gap-12">
        <div className="flex flex-col items-center text-center lg:items-start lg:text-left">
          <p className="mb-3 text-11px font-semibold uppercase tracking-[0.2em] text-indigo-200">
            Carto Store
          </p>
          <h3 className="mb-4 text-30px font-normal leading-tight text-white sm:text-36px">
            Latest Gadgets,
            <br />
            <span className="font-bold">Best Prices.</span>
          </h3>
          <p className="mb-6 max-w-md text-14px text-indigo-100 sm:text-16px">
            Original products with warranty and fast delivery.
          </p>

          <a
            href="#myScrollToElement"
            className="group inline-flex h-12 items-center justify-center rounded bg-white px-6 font-semibold text-gray-900 transition-colors duration-200 hover:bg-indigo-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900 motion-safe:transition-transform motion-safe:hover:-translate-y-0.5"
          >
            <span className="mr-2">Shop Now</span>
            <span className="transition-transform duration-200 group-hover:translate-x-1">
              <ArrowRight width="13px" />
            </span>
          </a>
        </div>

        <div
          aria-hidden="true"
          className="relative mx-auto hidden h-48 w-full max-w-[420px] items-center justify-center sm:flex"
        >
          <div className="absolute h-40 w-40 rounded-full bg-white/10 blur-2xl" />
          <svg
            viewBox="0 0 420 240"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            className="relative h-full w-full"
          >
            <circle cx="210" cy="120" r="88" fill="white" fillOpacity=".06" />
            <circle
              cx="210"
              cy="120"
              r="87"
              stroke="white"
              strokeOpacity=".16"
              strokeDasharray="4 8"
            />
            <path
              d="M104 74v37a43 43 0 0 0 86 0V74"
              stroke="#BFDBFE"
              strokeWidth="11"
              strokeLinecap="round"
            />
            <rect
              x="96"
              y="88"
              width="17"
              height="38"
              rx="8.5"
              fill="#DBEAFE"
            />
            <rect
              x="181"
              y="88"
              width="17"
              height="38"
              rx="8.5"
              fill="#DBEAFE"
            />
            <g transform="rotate(8 278 120)">
              <rect
                x="236"
                y="48"
                width="83"
                height="144"
                rx="17"
                fill="#111827"
                stroke="white"
                strokeOpacity=".75"
                strokeWidth="2"
              />
              <rect
                x="243"
                y="60"
                width="69"
                height="118"
                rx="10"
                fill="#EFF6FF"
              />
              <rect
                x="252"
                y="73"
                width="51"
                height="51"
                rx="15"
                fill="#BFDBFE"
              />
              <path
                d="M278 83c-9 0-16 7-16 16v8h32v-8c0-9-7-16-16-16Z"
                stroke="#4F46E5"
                strokeWidth="3"
              />
              <path
                d="M268 107v-8a10 10 0 0 1 20 0v8"
                stroke="#4F46E5"
                strokeWidth="3"
                strokeLinecap="round"
              />
              <rect
                x="253"
                y="135"
                width="49"
                height="6"
                rx="3"
                fill="#93C5FD"
              />
              <rect
                x="253"
                y="148"
                width="35"
                height="5"
                rx="2.5"
                fill="#CBD5E1"
              />
              <circle cx="277.5" cy="185" r="3" fill="#BFDBFE" />
            </g>
            <path
              d="m347 63 4 11 11 4-11 4-4 11-4-11-11-4 11-4 4-11Z"
              fill="#FDE68A"
            />
            <circle cx="335" cy="158" r="5" fill="#BFDBFE" />
            <circle cx="83" cy="158" r="4" fill="#FDE68A" />
          </svg>
        </div>
      </div>
    </CTABlock>
  );
}
