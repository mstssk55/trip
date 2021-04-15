/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/assets/function.js":
/*!*****************************************!*\
  !*** ./resources/js/assets/function.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

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
$(".plan_favorite").on('click', function () {
  var plan_id = this.id;
  var kanri = this.getAttribute('name');
  var trip_id = this.getAttribute('value');
  var id = plan_id.replace('plan_favorite', "");
  var kanri_flg = '';

  if (kanri == 1) {
    kanri_flg = 2;
  } else if (kanri == 2) {
    kanri_flg = 1;
  }

  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/tripplanfavorite',
    type: 'POST',
    dataType: 'json',
    data: {
      "id": id,
      "kanri_flg": kanri_flg,
      "trip_id": trip_id
    }
  }).done(function (result) {
    var setid = 'plan_favorite' + result["id"]; //ajaxに成功したらフロント側にeventを追加で表示

    document.getElementById(setid).setAttribute('name', result['kanri_flg']);

    if (result['kanri_flg'] == 1) {
      document.getElementById(setid).innerHTML = '<i class="far fa-star text-secondary"></i>';
      var removeid = 'dropadd' + result['id'];
      var removeevent = document.getElementById(removeid);
      removeevent.parentNode.remove();
    } else if (result['kanri_flg'] == 2) {
      document.getElementById(setid).innerHTML = '<i class="fas fa-star text-primary"></i>';
      var newdropevent = '<div class="mr-2" style="width:100px">';
      newdropevent += '<div id="dropadd' + result["id"] + '" class="fc-event mb-3 dropaddeventitem" style="width:100px">';
      newdropevent += '<p class="small mb-0 text-center p-2 dropaddebent">' + result["newtripplan"] + '</p>';
      newdropevent += '</div></div>';
      $('.newdropevent').append(newdropevent);
    }
  });
});

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./resources/js/assets/function.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/cms/resources/js/assets/function.js */"./resources/js/assets/function.js");


/***/ })

/******/ });