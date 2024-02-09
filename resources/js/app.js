import "./bootstrap";

import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

const buttonImg = document.getElementById("update-img");
const inputImg = document.getElementById("input-img");

buttonImg.addEventListener("change", function () {
    inputImg.classList.toggle("d-none");
});
