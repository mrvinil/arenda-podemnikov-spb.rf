function ajaxForm(obForm, link) {
    BX.bind(obForm, 'submit', BX.proxy(function(e) {
        BX.PreventDefault(e);
        obForm.getElementsByClassName('error-msg')[0].innerHTML = '';
 
        let xhr = new XMLHttpRequest();
        xhr.open('POST', link);
 
        xhr.onload = function() {
            if (xhr.status != 200) {
                alert(`Ошибка ${xhr.status}: ${xhr.statusText}`);
            } else {
                var json = JSON.parse(xhr.responseText)
 
                if (! json.success) {
                    let errorStr = '';
                    for (let fieldKey in json.errors) {
                        errorStr += json.errors[fieldKey] + '<br>';
                    }
                     
                    // Ошибки вывести в элемент с классом error-msg
                    obForm.getElementsByClassName('error-msg')[0].innerHTML = errorStr;
                } else {
                    obForm.reset();
                    $('#modalSuccessMessage').modal("toggle");
                }
            }
        };
 
        xhr.onerror = function() {
            $('#modalErrorMessage').modal();
        };
 
        // Передаем все данные из формы
        xhr.send(new FormData(obForm));
    }, obForm, link));
}

/*let today=new Date();
let datepicker = new AirDatepicker("#dpckinput", {
    range:true,
    inline:true,
    minDate:today,
    multipleDatesSeparator:' - ',
    onSelect:({date})=>{
        if(date.length==2) {
                firstDate=date[0].setDate(date[0].getDate());
                secondDate=date[1].setDate(date[1].getDate());
                afterFive=date[0].setDate(date[0].getDate()+4);
                if(secondDate<afterFive){
                    datepicker.unselectDate(secondDate);
                }
        }
    }
});*/