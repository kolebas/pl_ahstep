$(function() {
    $(document).on("click", '#blog-submit-button-save', function() {

        $type_like = $('#feed-add-post-grat-type-selected').attr('title');
		$owner_id =  $('#owner_id').val();
		$user_id = $(".ui-tile-selector-item-users").data('bx-id');
		$comment = $('#bxed_idPostFormLHE_blogPostForm').val();

		if ($user_id === undefined){
			alert('Не выбран получатель!');
			$(document).on("submit", '#blogPostForm', function() {return false;});
			$('#bxed_idPostFormLHE_blogPostForm').val('');
			window.location.reload();
		}
		else {

			$.ajax({
		        type: 'POST',
		        url: 'https://portal.ahstep.ru/ahstep/slider/sendThanks.php',
		        async: false,
		        data: ({
		            type_like: $type_like,
		            owner_id: $owner_id,
		            user_id: $user_id,
		            comment: $comment
		        }),
		        beforeSend: function(request) {
		            
		        },
		        success: function(data)
		        {
		        	//document.location.href='https://portal.ahstep.ru/about/test1.php';
		        }
		    }); 
		}
    });
});
