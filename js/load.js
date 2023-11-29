$(document).ready(function() {
    var page = 1; // Страница, которую нужно подгрузить
    var loading = false; // Флаг, предотвращающий многократные запросы

    function loadMoreProducts() {
        if (!loading) {
            loading = true;
            $.ajax({
                url: '/../src/actions/load.php', // Путь к файлу для загрузки товаров
                method: 'GET',
                data: { page: page },
                success: function(response) {
                    $('#products-container').append(response);
                    page++;
                    loading = false;
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    loading = false;
                }
            });
        }
    }

    // Обработчик события клика на кнопке "Дивитись більше"
    $('#load-more').click(function() {
        loadMoreProducts();
    });
});