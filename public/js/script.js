
// 編集・削除
const radios = document.querySelectorAll('input[name=id]');
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
    });
});

//新規作成で選択画像表示
function previewImage(obj)
{
	var fileReader = new FileReader();
	fileReader.onload = (function() {
		document.getElementById('preview').src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);
};


// レコード削除モーダル
if (document.querySelector('input[value=削除]')) {
    document.querySelector('input[value=削除]').addEventListener('click', () => {
        document.querySelector('div.modal-back').classList.remove('hidden');
    });
}
    
if (document.getElementById('close-modal')) {
    document.getElementById('close-modal').addEventListener('click',() => {
        document.querySelector('div.modal-back').classList.add('hidden');
    });
}


// キーワード検索
if (document.querySelector('input[value=検索]')) {
    document.querySelector('input[value=検索]').addEventListener('click', () => {
        // console.log('クリック');
        const keyword = document.getElementById('keyword').value;
        // console.log(keyword);
        const partialMatch = new RegExp(keyword);
        // console.log(partialMatch);
        
        const keywordNames = document.querySelectorAll('.content > h3');
        for (const keywordName of keywordNames) {
            console.log(keywordName);
            const result = keywordName.textContent.match(partialMatch);
            // console.log(result);
            if(result) {                
                // console.log(result);
                keywordName.parentNode.classList.remove('keyword-hidden');
            } else {
                keywordName.parentNode.classList.add('keyword-hidden');
            }
        };
        
        const keywordContents = document.querySelectorAll('.keyword-hidden.content > p');
        for (const keywordContent of keywordContents) {
            // console.log(keywordContent.textContent);
            const result = keywordContent.textContent.match(partialMatch);
            if(result) {                
                // console.log(result);
                keywordContent.parentNode.classList.remove('keyword-hidden');
            } else {
                keywordContent.parentNode.classList.add('keyword-hidden');
            }
        };
        
    });
}
    

// サイドメニュー開閉
for ( 
    const btn of document.getElementsByClassName('sidemenu-btn')
) {
    btn.addEventListener('click', () => {
        if(btn.textContent == '▼') {
            btn.nextElementSibling.classList.remove('sidemenu-hidden');
            btn.textContent = '▲';
        } else if (btn.textContent == '▲') {
            btn.nextElementSibling.classList.add('sidemenu-hidden');
            btn.textContent = '▼';
        };
    });
}

// アクセサリーモーダル
if (document.getElementById('accessory-detail')) {
    document.getElementById('accessory-detail').addEventListener('click', () => {
        document.querySelector('div.modal-back').classList.remove('accessory-hidden');
    });
}

if (document.getElementById('close-modal')) {
    document.getElementById('close-modal').addEventListener('click',() => {
        document.querySelector('div.modal-back').classList.add('accessory-hidden');
    });
}

