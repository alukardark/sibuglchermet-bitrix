if(document.getElementById('file')){
    document.getElementById('file').addEventListener('change', function () {
        var input = this;
        var output = input.parentNode.parentNode.parentNode.querySelector('.fancy-modal__file-list');
        var errorBlock = input.parentNode.parentNode.parentNode.querySelector('.fancy-modal__file-error');

        var children = "";
        var size = "";
        var sizeTotal = "";
        var flag = false;
        var list = new DataTransfer;

        for (var i = 0; i < input.files.length; ++i) {

            sizeTotal = size + input.files.item(i).size / 1024 / 1024;

            if (i > 2 ) {
                flag = true;
                errorBlock.textContent = "Максимальное количество файлов: 3";
                break;
            }else if(sizeTotal > 30){
                flag = true;
                errorBlock.textContent = "Общий размер файлов превышает 30Мб";
                break;
            }else{
                size = input.files.item(i).size / 1024 / 1024;
                children += '<li>' + input.files.item(i).name + '</li>';
                list.items.add(input.files[i]);
                errorBlock.textContent = "";
            }
        }
        output.innerHTML = '<ul>' + children + '</ul>';

        input.files = list.files;
    });

}


