'use strict'

const DATA_IMAGE_URL = 'https://nil.yonsei.ac.kr/data/image';
const DEV_DATA_URL = 'https://tienipia.oz4cs.com/ni/data';

var default_api_server = null;
var lms_api_url = null;

if (location.host == 'tienipia.oz4cs.com') {
	console.log('dev-server');
	default_api_server = 'https://tienipia.oz4cs.com/was/yonsei';
} else {
	default_api_server = (Math.random() >= 0.5) ? 'https://service-zone-a.tienipia.com/was/yonsei'
		: 'https://service-zone-a.tienipia.com/was/yonsei';
}


if (!Array.prototype.includes) {
	Object.defineProperty(Array.prototype, "includes", {
		enumerable: false,
		value: function(obj) {
			var newArr = this.filter(function(el) {
				return el == obj;
			});
			return newArr.length > 0;
		}
	});
}