const popup = document.getElementById("popup");
const popupImage = document.getElementById("popup-image");
const popupTitle = document.getElementById("popup-title");
const popupDescription = document.getElementById("popup-description");
const downloadLink = document.getElementById("download-link");
const closePopup = document.getElementById("close-popup");

document.querySelectorAll(".popup-trigger").forEach((img) => {
  img.addEventListener("click", () => {
    const filePath = img.dataset.file;

    popupImage.src = img.src;
    popupTitle.textContent = img.alt;
    popupDescription.textContent = "A detailed view of the notice.";
    downloadLink.href = filePath;

    popup.classList.remove("hidden");
    popup.classList.add("visible");
  });
});

closePopup.addEventListener("click", () => {
  popup.classList.remove("visible");
  popup.classList.add("hidden");
});

popup.addEventListener("click", (event) => {
  if (event.target === popup) {
    popup.classList.remove("visible");
    popup.classList.add("hidden");
  }
});
