const editSelectors = {
    nav: {
        wrapper: '.links-wrapper',
        item: '.links-item',
        removeAction: '.remove-link',
        addAction: '.add-new-link'
    }   
}

$(document).on('click', editSelectors.nav.addAction, function(e) {
    e.preventDefault();
    
    let key = parseInt($(editSelectors.nav.wrapper).data('last_key'))
    key++
    
    const template = `` +
        `<div class="row mb-3 d-flex align-items-center justify-content-center bg-body-secondary p-2 links-item">
            <div class="col-9">
                <label for="link_text_${key}">Title</label>
                <input type="text"
                       class="form-control"
                       id="link_text_${key}"
                       name="links[${key}][title]"
                >
                <label for="link_${key}">Link</label>
                <input type="text"
                       class="form-control"
                       id="link_${key}"
                       name="links[${key}][href]"
                >
            </div>
            <div class="col-3 text-center">
                <a href="#" class="btn btn-outline-danger remove-link"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>`

    $(editSelectors.nav.wrapper).append(template).data('last_key', key)
})

$(document).on('click', editSelectors.nav.removeAction, function(e) {
    e.preventDefault()
    $(this).parents(editSelectors.nav.item).remove()
})
