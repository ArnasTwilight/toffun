function weaponAttacks() {
    let element, fields;
    element = document.getElementById("weapon_attacks");
    fields = document.createElement('div');
    fields.classList.add('form-group', 'col-xl-4', 'col-lg-6');
    fields.innerHTML = `
    <div class="d-flex">
        <select class="form-control mb-1" name="type[]">
            <option value="1">Normal</option>
            <option value="2">Dodge</option>
            <option value="3">Skill</option>
            <option value="4">Discharge</option>
        </select>
        <input class="btn btn-danger ml-1 mb-1" type="button" value="x" onclick="delElement(this);">
    </div>
    <input class="form-control mb-1" type="text" placeholder="Name attack" name="title_attacks[]">
    <textarea class="form-control" name="description[]" rows="3" placeholder="Description attack"></textarea>`;

    element.appendChild(fields);
}

function delElement(element) {
    let fields = element.parentNode.parentNode
    fields.parentNode.removeChild(fields);
}
