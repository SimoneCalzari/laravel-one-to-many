import "./bootstrap";

import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

const buttonImg = document.getElementById("update-img");
const inputImgDiv = document.getElementById("input-img");
if (buttonImg) {
    buttonImg.addEventListener("change", function () {
        inputImgDiv.classList.toggle("d-none");
    });
}

const buttonEmptyImg = document.getElementById("empty-img-field");
const inputImg = document.getElementById("project-img");
if (buttonEmptyImg) {
    buttonEmptyImg.addEventListener("click", function () {
        inputImg.value = "";
    });
}
