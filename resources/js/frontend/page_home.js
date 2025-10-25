import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

$(document).ready(function(){
  $('.filter-btn').click(function(){
    // Quitar la clase activa de todos los botones
    $('.filter-btn').removeClass('bg-gray-800').addClass('bg-blue-500');

    // Agregar la clase activa solo al clickeado
    $(this).removeClass('bg-blue-500').addClass('bg-gray-800 text-white');
    const id = $(this).data('id');
    const idformat = (id === 'all') ? 'all' : id;
    $.get(`/filter/${idformat}`, function(data){
      let html = '';
      data.forEach(item => {
        html += `
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <h2 class="text-lg font-semibold">
              <a href="${item.routedetail}">
                ${item.brand}
              </a>
            </h2>
            <p>Año: ${item.year}</p>
            <p>Capacidad: ${item.capacity}</p>
            <p>FOB: $${item.price_FOB}</p>
            <p>CIF: $${item.price_CIF}</p>
            <button class="view-detail bg-green-500 text-white px-3 py-1 rounded mt-2" data-id="${item.id}">
                Ver detalle
            </button>
        </div>`;
      });
      $('#itemsContainer').html(html);
    });
  });
  // Ver detalle AJAX
  $(document).on('click', '.view-detail', function(){
    const id = $(this).data('id');
    $.get(`/item/${id}`, function(data){
      $('#modalTitle').text(data.brand);
      $('#modalContent').html(`
        <p><strong>Año:</strong> ${data.year}</p>
        <p><strong>Capacidad:</strong> ${data.capacity}</p>
        <p><strong>FOB:</strong> $${data.price_FOB}</p>
        <p><strong>CIF:</strong> $${data.price_CIF}</p>
      `);
      $('#detailModal').removeClass('hidden');
    });
  });

  $('#closeModal').click(function(){
    $('#detailModal').addClass('hidden');
  });
});

/* -------------- VALIDATING CAROUSELS WHEN ENTERING A CERTAIN SCREEN DIMENSION -------------- */  
let owlInitialized = false;
function initializeOwl(){
  if($(window).width() < 992){
    if(!owlInitialized){
      /* -------------- CARRUSEL OWLCAROUSEL - LISTADO DE CATEGORÍAS DE (TENDENCIAS) -------------- */
      $('#filterCategTabs').owlCarousel({
        loop: true,
        margin: 10,
        // autoplay: true,
        // autoplayTimeout: 2000,
        // autoplayHoverPause: false,
        nav: false,
        dots: false,
        responsiveClass: true,
        startPosition: 0,
        center: false,
        responsive:{
          0:{
            items: 3,
            nav: true,
            margin: 10,
          },
          500:{
            margin: 10,
            items: 3
          },
          900:{
            items: 4
          },
        }
      });
      owlInitialized = true;
    }
  }else{

    if(owlInitialized){
      // -------------- DESACTIVAR PRODUCT_FILTER CARRUSEL
      $('#filterCategTabs').trigger('destroy.owl.carousel');
      $('#filterCategTabs').removeClass('owl-loaded owl-drag');
      $('#filterCategTabs').find('.owl-stage-outer').children().unwrap();

      owlInitialized = false;
    }
  }
}
initializeOwl();
$(window).resize(function(){
  initializeOwl();
});