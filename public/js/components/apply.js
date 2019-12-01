let body = document.querySelector("body");
body.addEventListener('click', function(e) {
    if(e.target.matches(".apply")){
        document.body.innerHTML += `<div class="popup">
            <form>
                <div class="form-group">
                    <label for="reason">Waarom wil je hier stage doen?</label>
                    <textarea name="reason" class="form-control" id="reason"></textarea>
                    <button type="submit" class="btn btn-primary">Solliciteren</button>
                </div>
            </form>
            <img class="close" src="../img/close.svg">
        </div>`;
    }else if(e.target.matches(".close")){
        document.querySelector('.popup').remove();
    }
});
