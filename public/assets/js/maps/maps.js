let map;
let marker;
let infoWindow;
let mapObj;

  
  
  function initMap() {
    // マップを表示するidを取得しmapに入れる
    map = document.getElementById("map");
    // center位置の設定
    const centerp = {lat: 35.6585769, lng: 139.7454506};
    // オプションを設定
    opt = {
        zoom: 15, //地図の縮尺を指定
        center: centerp, //センター指定
    };
    // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
    mapObj = new google.maps.Map(map, opt);
    // 検索ボタンの処理
    document.getElementById("search").addEventListener('click',function(){
        let place = $("#keyword").val();
        console.log(place)
        let geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            address:place
        },function(results,status){
            if(status == google.maps.GeocoderStatus.OK){
                let bounds = new google.maps.LatLngBounds();
                console.log(bounds)
                for(var i in results){
                    if(results[0].geometry){
                        let latlng = results[0].geometry.location;
                        let address = results[0].formatted_address;
                        console.log(address)
                        bounds.extend(latlng);
                        setMarker(latlng);
                        setInfoW(place,latlng,address);
                        markerEvent();
                        change(latlng);
                    }
                }
                
            }else if(status == google.maps.GeocoderStatus.ZERO_RESULTS){
                alert("見つかりません");
            }else{
                console.log(status);
                alert("エラー");
            }
        
        })
    })
    
    document.getElementById('clear').addEventListener('click', function() {
          deleteMarkers();
    });
    
  }
 function setMarker(setplace){
     deleteMarkers();
     let iconUrl = 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png';
     marker = new google.maps.Marker({
         position: setplace,
         map:mapObj,
         icon:iconUrl
     })
 }
 
 function deleteMarkers(){
     if(marker != null){
         marker.setMap(null);
     }
     marker = null;
 }
 
 function setInfoW(place,latlng,address){
     infoWindow = new google.maps.InfoWindow({
         content: "<a href='http://www.google.com/search?q=" + place + "' target='_blank'>" + place + "</a><br><br>" + latlng + "<br><br>" + address + "<br><br><a href='http://www.google.com/search?q=" + place + "&tbm=isch' target='_blank'>画像検索 by google</a>"
     })
 }
 
 function markerEvent(){
     marker.addListener('click',function(){
         infoWindow.open(map,marker);
     })
 }
 
//  function toTokyo() {
//   map.panTo(new google.maps.LatLng(35.680865,139.767036));
// }

function change(latlng){
         mapObj.panTo(latlng)
}


 
//     // 追加
//     marker = new google.maps.Marker({
//         // ピンを差す位置を決めます。
//         position: centerp,
// 	// ピンを差すマップを決めます。
//         map: mapObj,
// // 	// ホバーしたときに「tokyotower」と表示されるようにします。
//         title: 'tokyotower',
//     });
    
//     marker.addListener('mouseover', function() {
//         var latlng = new google.maps.LatLng(35.6585769,139.7454506);
//         const pixelOffset = new google.maps.Size(0,-40)
//         const title = 'tokyoTower'
//         // infoの位置
//         hoverinfo = new google.maps.InfoWindow({
//             map: mapObj,
//             content: title,
//             noSuppress: true,
//             pixelOffset: pixelOffset
//         });
 
//         hoverinfo.setPosition(
//             latlng 
//         );
//         marker.addListener('mouseout', function() {
//             if(hoverinfo)
//                 hoverinfo.close();
//         });
//     });
    
    
//   };