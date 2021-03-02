(function ($) {

    let inputCounter = 0

    const searchTags = (tag) => {
        $.ajax({
            url: KurdishDB.ajaxurl,
            type: 'post',
            data: {
                action: 'search_tags',
                security: KurdishDB.ajaxnonce,
                search_tag: tag
            },
            success: function (response) {
                $('#tag-results').empty();
                console.log('success', JSON.parse(response));
                results = JSON.parse(response)
                for (const property in results) {
                    console.log(`${property}: ${results[property]}`);
                    let tagResultElem = $("<li></li>").text(`${ results[property]}`)
                    $('#tag-results').append(tagResultElem)
                }
                
            }
        });
    }
    const searchPosts = (searchText) => {
        console.log('ajax', KurdishDB.ajaxurl);
        $.ajax({
            url: KurdishDB.ajaxurl,
            type: 'post',
            data: {
                action: 'search_tags',
                security: KurdishDB.ajaxnonce,
                search_text: searchText
            },
            success: function (response) {
                console.log('success', response);

            }
        });
    }


    $(document).ready(function () {
        console.log('READY');
        // $('body').on('click', '#searchButton', function (e) {
        //     var searchText = $('#search').value()
        //     console.log('searchText', searchText)
        //     e.preventDefault();
        //     $.ajax({
        //         url: ALW_JS.ajaxurl,
        //         type: 'post',
        //         data: {
        //             action: 'do_a_search',
        //             security: ALW_JS.ajaxnonce,
        //             search_text: 'post'
        //         },
        //         success: function (response) {
        //             console.log('success', response);
        //         }
        //     });
        // });
        $('body').on('input', '#search', function (e) {
            inputCounter++
            let searchText = $('#search').val()
            if ($('#searchTerm').length) {
                    $('#searchTerm').text('Searching: ' + searchText)
            } else {
                let tagResultElem = $("<span id='searchTerm'></span>").text('Searching: ' + searchText)
                $('#tag-search').append(tagResultElem)
            }
            // trigger AJAX search
            searchTags(searchText)
            
        });

    });
})(jQuery);
