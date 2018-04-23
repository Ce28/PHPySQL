function init()
{

	var selected_article_id = null;
	function load_news()
	{
		$('#divFormNew').hide('slow');
		$('#divFormDetails').hide('slow');

		$('#divNews').hide('slow');
		$.ajax({
		   url: 'ws/select.php',
		   success: function(data)
		   {
		   		$('#divNews').show('slow').html(data);
		   		$('#divNews').off('click').on('click', '.alert.hollow', function(evt) 
		   		{
		   			var id_article = $(this).data("id");
		   			var confirmation = confirm('¿Seguro que desea eliminar la noticia con el ID ' + id_article + '?');

		   			if(confirmation)
		   			{
		   				delete_article(id_article);
		   			}
				  	
				  	evt.preventDefault();
				});

				$('#divNews').on('click', '.primary.hollow', function(evt) {
				  select_details($(this).data("id"));
				  evt.preventDefault();
				});
		   }
		});
	}

	function insert()
	{
		$.ajax({
		   method: 'POST',
		   url: 'ws/create.php',
		   data: $('#frmNew').serialize(),
		   success: function(data)
		   {
		   		load_news();
		   }
		});
	}

	function update_article()
	{
		$.ajax({
		   method: 'POST',
		   url: 'ws/update.php?id=' + selected_article_id,
		   data: $('#frmUpdate').serialize(),
		   success: function(data)
		   {
		   		load_news();
		   }
		});
	}

	function select_details(id)
	{
		$.ajax({
		   url: 'ws/select_details.php?id=' + id,
		   data: $('#frmNew').serialize(),
		   success: function(data)
		   {
		   		//alert($('#divFormDetails #txtTitle').length);
		   		selected_article_id = data.id;
		   		$('#divFormDetails #txtTitle').val(data.title);
		   		$('#divFormDetails #txaContent').val(data.content);
		   		$('#divFormDetails').show('slow');
		   }
		});
	}

	function delete_article(id)
	{
		$.ajax({
		   url: 'ws/delete.php?id=' + id,
		   success: function(data)
		   {
		   		//alert($('#divFormDetails #txtTitle').length);
		   		load_news();
		   }
		});
	}

	load_news();

	$('#btnUpdate').on('click', function(){ update_article();return false; });

	$('#btnAdd').on('click', function(){insert(); return false;});

	$('#divFormNew').hide();
	$('#divFormDetails').hide();

	$('#lnkRefresh').on('click', function(){load_news();});

	$('#lnkNew').on('click', function()
		{
			$('#divFormNew').toggle('slow', function(){});
		});



}

$( init );