/* global $*/
// $('.user-search-form .search-icon').on('click', function () {

//     let userName = $('#search_name').val(); //検索ワードを取得
//     if (!userName) {
//         return false;
//     } //ガード節で検索ワードが空の時、ここで処理を止めて何もビューに出さない

//     $.ajax({
//         headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },//Headersを書き忘れるとエラーになる
//         type: 'GET',
//         url: '/profile/' + userName, //後述するweb.phpのURLと同じ形にする
//         data: {
//             'search_name': userName, //ここはサーバーに贈りたい情報。今回は検索ファームのバリューを送りたい。
//         },
//         dataType: 'json', //json形式で受け取る
        
       
//     }).done(function (data) {
//         let html = 'あ';
//         console.log(html)
//         $.each(data, function (index, value) { //dataの中身からvalueを取り出す
// 　　　　//ここの記述はリファクタ可能
//             let id = value.id;
//             let name = value.name;
//         // let avatar = value.avatar;
//         // let itemsCount = value.items_count;
//         　　　　        // １ユーザー情報のビューテンプレートを作成
//             html ='<tr class="user-list">';
//             html +='<td class="col-xs-3">${name}</td>';
//             html +='</tr>';
//         });
//         $('.user-table').append(html); //できあがったテンプレートをビューに追加
//         console.log(html+'あいう')
// 　　　// 検索結果がなかったときの処理
//         if (data.length === 0) {
//             // $('.user-index-wrapper').after('<p class="text-center mt-5 search-null">ユーザーが見つかりません</p>');
//             alert("データがない");
            
//         }

//     }).fail(function () {
//         　　　//ajax通信がエラーのときの処理
//         alert('どんまい！');
//     });
// }); 

$(".plan_favorite").on('click',function(){
    const plan_id = this.id;
    const kanri = this.getAttribute('name');
    const trip_id = this.getAttribute('value');
    const id = plan_id.replace('plan_favorite',"");
    let kanri_flg='';
    if(kanri ==1){
        kanri_flg = 2;
    }else if(kanri ==2){
        kanri_flg = 1
    }
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/tripplanfavorite',
        type: 'POST',
        dataType: 'json',
        data:{
            "id":id,
            "kanri_flg":kanri_flg,
            "trip_id":trip_id,
        }
        
    }).done(function(result) {
        const setid = 'plan_favorite' + result["id"];
        //ajaxに成功したらフロント側にeventを追加で表示
        document.getElementById(setid).setAttribute('name',result['kanri_flg'])
        if(result['kanri_flg'] == 1){
            document.getElementById(setid).innerHTML = '<i class="far fa-star text-secondary"></i>'
            const removeid = 'dropadd'+result['id']
            const removeevent = document.getElementById(removeid)
            removeevent.parentNode.remove();
        }else if(result['kanri_flg'] == 2){
            document.getElementById(setid).innerHTML = '<i class="fas fa-star text-primary"></i>'
            let newdropevent = '<div class="mr-2" style="width:100px">'
            newdropevent += '<div id="dropadd'+result["id"]+'" class="fc-event mb-3 dropaddeventitem" style="width:100px">'
            newdropevent += '<p class="small mb-0 text-center p-2 dropaddebent">' +result["newtripplan"] +'</p>'
            newdropevent += '</div></div>'
            $('.newdropevent').append(newdropevent)
        }
        
    });
})