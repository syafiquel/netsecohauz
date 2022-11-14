/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/modules-datatables.js":
/*!********************************************!*\
  !*** ./resources/js/modules-datatables.js ***!
  \********************************************/
/***/ (() => {

eval("\n\n$(\"[data-checkboxes]\").each(function () {\n  var me = $(this),\n    group = me.data('checkboxes'),\n    role = me.data('checkbox-role');\n  me.change(function () {\n    var all = $('[data-checkboxes=\"' + group + '\"]:not([data-checkbox-role=\"dad\"])'),\n      checked = $('[data-checkboxes=\"' + group + '\"]:not([data-checkbox-role=\"dad\"]):checked'),\n      dad = $('[data-checkboxes=\"' + group + '\"][data-checkbox-role=\"dad\"]'),\n      total = all.length,\n      checked_length = checked.length;\n    if (role == 'dad') {\n      if (me.is(':checked')) {\n        all.prop('checked', true);\n      } else {\n        all.prop('checked', false);\n      }\n    } else {\n      if (checked_length >= total) {\n        dad.prop('checked', true);\n      } else {\n        dad.prop('checked', false);\n      }\n    }\n  });\n});\n$(\"#table-1\").dataTable({\n  \"columnDefs\": [{\n    \"sortable\": false,\n    \"targets\": [2, 3]\n  }]\n});\n$(\"#table-2\").dataTable({\n  \"columnDefs\": [{\n    \"sortable\": false,\n    \"targets\": [0, 2, 3]\n  }]\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvbW9kdWxlcy1kYXRhdGFibGVzLmpzLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViQSxDQUFDLENBQUMsbUJBQW1CLENBQUMsQ0FBQ0MsSUFBSSxDQUFDLFlBQVc7RUFDckMsSUFBSUMsRUFBRSxHQUFHRixDQUFDLENBQUMsSUFBSSxDQUFDO0lBQ2RHLEtBQUssR0FBR0QsRUFBRSxDQUFDRSxJQUFJLENBQUMsWUFBWSxDQUFDO0lBQzdCQyxJQUFJLEdBQUdILEVBQUUsQ0FBQ0UsSUFBSSxDQUFDLGVBQWUsQ0FBQztFQUVqQ0YsRUFBRSxDQUFDSSxNQUFNLENBQUMsWUFBVztJQUNuQixJQUFJQyxHQUFHLEdBQUdQLENBQUMsQ0FBQyxvQkFBb0IsR0FBR0csS0FBSyxHQUFHLG9DQUFvQyxDQUFDO01BQzlFSyxPQUFPLEdBQUdSLENBQUMsQ0FBQyxvQkFBb0IsR0FBR0csS0FBSyxHQUFHLDRDQUE0QyxDQUFDO01BQ3hGTSxHQUFHLEdBQUdULENBQUMsQ0FBQyxvQkFBb0IsR0FBR0csS0FBSyxHQUFHLDhCQUE4QixDQUFDO01BQ3RFTyxLQUFLLEdBQUdILEdBQUcsQ0FBQ0ksTUFBTTtNQUNsQkMsY0FBYyxHQUFHSixPQUFPLENBQUNHLE1BQU07SUFFakMsSUFBR04sSUFBSSxJQUFJLEtBQUssRUFBRTtNQUNoQixJQUFHSCxFQUFFLENBQUNXLEVBQUUsQ0FBQyxVQUFVLENBQUMsRUFBRTtRQUNwQk4sR0FBRyxDQUFDTyxJQUFJLENBQUMsU0FBUyxFQUFFLElBQUksQ0FBQztNQUMzQixDQUFDLE1BQUk7UUFDSFAsR0FBRyxDQUFDTyxJQUFJLENBQUMsU0FBUyxFQUFFLEtBQUssQ0FBQztNQUM1QjtJQUNGLENBQUMsTUFBSTtNQUNILElBQUdGLGNBQWMsSUFBSUYsS0FBSyxFQUFFO1FBQzFCRCxHQUFHLENBQUNLLElBQUksQ0FBQyxTQUFTLEVBQUUsSUFBSSxDQUFDO01BQzNCLENBQUMsTUFBSTtRQUNITCxHQUFHLENBQUNLLElBQUksQ0FBQyxTQUFTLEVBQUUsS0FBSyxDQUFDO01BQzVCO0lBQ0Y7RUFDRixDQUFDLENBQUM7QUFDSixDQUFDLENBQUM7QUFFRmQsQ0FBQyxDQUFDLFVBQVUsQ0FBQyxDQUFDZSxTQUFTLENBQUM7RUFDdEIsWUFBWSxFQUFFLENBQ1o7SUFBRSxVQUFVLEVBQUUsS0FBSztJQUFFLFNBQVMsRUFBRSxDQUFDLENBQUMsRUFBQyxDQUFDO0VBQUUsQ0FBQztBQUUzQyxDQUFDLENBQUM7QUFDRmYsQ0FBQyxDQUFDLFVBQVUsQ0FBQyxDQUFDZSxTQUFTLENBQUM7RUFDdEIsWUFBWSxFQUFFLENBQ1o7SUFBRSxVQUFVLEVBQUUsS0FBSztJQUFFLFNBQVMsRUFBRSxDQUFDLENBQUMsRUFBQyxDQUFDLEVBQUMsQ0FBQztFQUFFLENBQUM7QUFFN0MsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL21vZHVsZXMtZGF0YXRhYmxlcy5qcz9kMjQ5Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xuXG4kKFwiW2RhdGEtY2hlY2tib3hlc11cIikuZWFjaChmdW5jdGlvbigpIHtcbiAgdmFyIG1lID0gJCh0aGlzKSxcbiAgICBncm91cCA9IG1lLmRhdGEoJ2NoZWNrYm94ZXMnKSxcbiAgICByb2xlID0gbWUuZGF0YSgnY2hlY2tib3gtcm9sZScpO1xuXG4gIG1lLmNoYW5nZShmdW5jdGlvbigpIHtcbiAgICB2YXIgYWxsID0gJCgnW2RhdGEtY2hlY2tib3hlcz1cIicgKyBncm91cCArICdcIl06bm90KFtkYXRhLWNoZWNrYm94LXJvbGU9XCJkYWRcIl0pJyksXG4gICAgICBjaGVja2VkID0gJCgnW2RhdGEtY2hlY2tib3hlcz1cIicgKyBncm91cCArICdcIl06bm90KFtkYXRhLWNoZWNrYm94LXJvbGU9XCJkYWRcIl0pOmNoZWNrZWQnKSxcbiAgICAgIGRhZCA9ICQoJ1tkYXRhLWNoZWNrYm94ZXM9XCInICsgZ3JvdXAgKyAnXCJdW2RhdGEtY2hlY2tib3gtcm9sZT1cImRhZFwiXScpLFxuICAgICAgdG90YWwgPSBhbGwubGVuZ3RoLFxuICAgICAgY2hlY2tlZF9sZW5ndGggPSBjaGVja2VkLmxlbmd0aDtcblxuICAgIGlmKHJvbGUgPT0gJ2RhZCcpIHtcbiAgICAgIGlmKG1lLmlzKCc6Y2hlY2tlZCcpKSB7XG4gICAgICAgIGFsbC5wcm9wKCdjaGVja2VkJywgdHJ1ZSk7XG4gICAgICB9ZWxzZXtcbiAgICAgICAgYWxsLnByb3AoJ2NoZWNrZWQnLCBmYWxzZSk7XG4gICAgICB9XG4gICAgfWVsc2V7XG4gICAgICBpZihjaGVja2VkX2xlbmd0aCA+PSB0b3RhbCkge1xuICAgICAgICBkYWQucHJvcCgnY2hlY2tlZCcsIHRydWUpO1xuICAgICAgfWVsc2V7XG4gICAgICAgIGRhZC5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1xuICAgICAgfVxuICAgIH1cbiAgfSk7XG59KTtcblxuJChcIiN0YWJsZS0xXCIpLmRhdGFUYWJsZSh7XG4gIFwiY29sdW1uRGVmc1wiOiBbXG4gICAgeyBcInNvcnRhYmxlXCI6IGZhbHNlLCBcInRhcmdldHNcIjogWzIsM10gfVxuICBdXG59KTtcbiQoXCIjdGFibGUtMlwiKS5kYXRhVGFibGUoe1xuICBcImNvbHVtbkRlZnNcIjogW1xuICAgIHsgXCJzb3J0YWJsZVwiOiBmYWxzZSwgXCJ0YXJnZXRzXCI6IFswLDIsM10gfVxuICBdXG59KTtcbiJdLCJuYW1lcyI6WyIkIiwiZWFjaCIsIm1lIiwiZ3JvdXAiLCJkYXRhIiwicm9sZSIsImNoYW5nZSIsImFsbCIsImNoZWNrZWQiLCJkYWQiLCJ0b3RhbCIsImxlbmd0aCIsImNoZWNrZWRfbGVuZ3RoIiwiaXMiLCJwcm9wIiwiZGF0YVRhYmxlIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/modules-datatables.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/modules-datatables.js"]();
/******/ 	
/******/ })()
;