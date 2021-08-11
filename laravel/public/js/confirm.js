function deleteHandle(event){
    //　一旦フォームの動きを止める
    event.preventDefault();
    if(window.confirm('本当に削除していいですか？')){
        // 削除オッケーならformを再開
        document.getElementById('delete-form').submit();
    }else{
        alert('キャンセルしました');
    }
}