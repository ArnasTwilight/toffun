function relicStars() {
    let element, fields;
    element = document.getElementById("relic_stars");
    fields = document.createElement('div');
    fields.classList.add('form-group', 'col-xl-4', 'col-lg-6');
    fields.innerHTML = `
    <div class="d-flex">
        <input class="form-control" type="number" name="star[]" value="" placeholder="Number of stars">
        <input class="btn btn-danger ml-1 mb-1" type="button" value="x" onclick="delElement(this);">
    </div>
    <textarea class="form-control" name="effect[]" rows="3" placeholder="Enter effect..."></textarea>`;
    element.appendChild(fields);
}

function delElement(element) {
    let fields = element.parentNode.parentNode
    fields.parentNode.removeChild(fields);
}

