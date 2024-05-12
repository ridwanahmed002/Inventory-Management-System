$(document).ready(function() {
    fetchWelcomeTexts();
  
    function fetchWelcomeTexts() {
      $.ajax({
        url: '../control/welcometexts.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
          let slideshow = $('.slideshow');
          data.forEach(function(text, index) {
            slideshow.append('<div>' + text + '</div>');
          });
          startSlideshow();
        },
        error: function(error) {
          console.error('Error fetching welcome texts:', error);
        }
      });
    }
  
    function startSlideshow() {
      let index = 0;
      const slides = $('.slideshow div');
      const numSlides = slides.length;
  
      function showSlide(i) {
        slides.eq(i).fadeIn(500).siblings().fadeOut(500);
      }
  
      function nextSlide() {
        index = (index + 1) % numSlides;
        showSlide(index);
      }
  
      slides.hide().eq(0).show();
      setInterval(nextSlide, 3000);
    }
  });
  