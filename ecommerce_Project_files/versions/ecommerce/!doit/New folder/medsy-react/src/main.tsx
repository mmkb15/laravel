import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';
import 'typeface-open-sans';
import 'rc-collapse/assets/index.css';
import 'overlayscrollbars/overlayscrollbars.css';
import 'assets/styles/scrollbar.css';
import 'assets/styles/rc-collapse.css';
import 'assets/styles/index.css';

ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
