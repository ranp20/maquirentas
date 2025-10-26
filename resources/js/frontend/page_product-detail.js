import '../plugins/magiczoom/magiczoomplus.js';
import '../plugins/magiczoom/magiczoomplus.css';

// IMPLEMENTANDO MAGICZOOMPLUS Y ALGUNAS FUNCIONES PARA LA GALERÍA...
const scrollContainer = document.querySelector('.cGalleryScroll__c');
let isMouseDown = false;
let startX;
let scrollLeft;
scrollContainer.addEventListener('mousedown', (e) => {
  isMouseDown = true;
  startX = e.pageX - scrollContainer.offsetLeft;
  scrollLeft = scrollContainer.scrollLeft;
});
scrollContainer.addEventListener('mouseleave', () => {
  isMouseDown = false;
});
scrollContainer.addEventListener('mouseup', () => {
  isMouseDown = false;
});
scrollContainer.addEventListener('mousemove', (e) => {
  if (!isMouseDown) return;
  e.preventDefault();
  const x = e.pageX - scrollContainer.offsetLeft;
  const walk = (x - startX) * 1.5; // Adjust the scroll speed as needed
  scrollContainer.scrollLeft = scrollLeft - walk;
});
scrollContainer.addEventListener('touchstart', (e) => {
  isMouseDown = true;
  startX = e.touches[0].pageX - scrollContainer.offsetLeft;
  scrollLeft = scrollContainer.scrollLeft;
});
scrollContainer.addEventListener('touchend', () => {
  isMouseDown = false;
});
scrollContainer.addEventListener('touchcancel', () => {
  isMouseDown = false;
});
scrollContainer.addEventListener('touchmove', (e) => {
  if (!isMouseDown) return;
  e.preventDefault();
  const x = e.touches[0].pageX - scrollContainer.offsetLeft;
  const walk = (x - startX) * 1.5; // Adjust the scroll speed as needed
  scrollContainer.scrollLeft = scrollLeft - walk;
});
const scrollContainer2 = $('.cGalleryScroll');
const content2 = $('.cGalleryScroll__c');
const scrollButtons = $('.scroll-btn');
const itemWidth = content2.find('.item').outerWidth(true); // Width of each item including margin
$('.scroll-btn').on('click', function() {
  const isPrev = $(this).hasClass('prev');
  const scrollAmount = isPrev ? -itemWidth : itemWidth;
  const animationSpeed = 300; // You can use 'fast', 'slow', or a specific duration in milliseconds
  if (isPrev) {
  content2.animate({
    scrollLeft: '-=' + itemWidth
  }, animationSpeed);
  } else {
  content2.animate({
    scrollLeft: '+=' + itemWidth
  }, animationSpeed);
  }
  return false;
});