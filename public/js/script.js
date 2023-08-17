
// 編集・削除
const radios = document.querySelectorAll('input[name=id]')
// const radios = document.querySelectorAll('#edit input[type=radio]')
// console.log(radios);
radios.forEach((radio)=>{

    console.log(radio);

    radio.addEventListener('click', ()=>{
        console.log(radio.value);
        document.getElementById('edit').href = document.getElementById('edit').href.replace(/\/instruments\/[0-9]*\/edit/, `/instruments/${radio.value}/edit`);
        document.getElementById('delete').action = document.getElementById('delete').action.replace(/\/instruments\/[0-9]*/, `/instruments/${radio.value}`);
        document.getElementById('edit').href = document.getElementById('edit').href.replace(/\/accessories\/[0-9]*\/edit/, `/accessories/${radio.value}/edit`);
        document.getElementById('delete').action = document.getElementById('delete').action.replace(/\/accessories\/[0-9]*/, `/accessories/${radio.value}`);
        document.getElementById('edit').href = document.getElementById('edit').href.replace(/\/categories\/[0-9]*\/edit/, `/categories/${radio.value}/edit`);
        document.getElementById('delete').action = document.getElementById('delete').action.replace(/\/categories\/[0-9]*/, `/categories/${radio.value}`);
    })
})


//新規作成で選択画像表示
function previewImage(obj)
{
	var fileReader = new FileReader();
	fileReader.onload = (function() {
		document.getElementById('preview').src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);
}