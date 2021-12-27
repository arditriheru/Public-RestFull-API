<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>

<script>
	$('#search-button').on('click', function() {
		$.ajax({
			url: 'http://omdbapi.com',
			type: 'get',
			dataType: 'json',
			data: {
				'apikey': '621ca456',
				's': $('#search-input').val()
			},
			success: function(result) {
				if (result.Response == "True") {
					let movies = result.Search;

					$.each(movies, function(i, data) {
						$('#movie-list').append(`
                        <div class="col-md-4">
                        <div class="card mb-5">
                        <img src="` + data.Poster + `" class="card-img-top" alt="Poster">
                        <div class="card-body">
                            <h5 class="card-title">` + data.Title + `</h5>
                            <h6 class="card-subtitle mb-2 text-muted">` + data.Year + `</h6>
                            <a href="#" class="card-link">See Detail</a>
                        </div>           
                        </div>
                        </div>

                        `);
					});

				} else {
					$('#movie-list').html(`
                    <div class="col">
                    <h1 class="text-center">` + result.Error + `</h1>
                    </div>
                    `);
				}
			}
		});
	});
</script>