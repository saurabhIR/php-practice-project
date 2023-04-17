const reviewsDiv = document.querySelector('.reviews');
const toggleButton = document.querySelector('#toggle-button');

toggleButton.addEventListener('click', () => {
  reviewsDiv.classList.toggle('show-reviews');
});