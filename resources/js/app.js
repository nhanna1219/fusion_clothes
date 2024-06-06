import "./bootstrap";
import "./home";
import "./product_detail";
import "./checkout";
import "./cart";

window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

