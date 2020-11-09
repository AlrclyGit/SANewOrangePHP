import { Base } from '../../utils/base.js';

class Home extends Base {

  /**
   * 
   */
  constructor() {
    super();
  }

  /**
   * 
   */
  getBannerData(callback) {
    var params = {
      url: 'banner/1',
      sCallback: function (data) {
        callback && callback(data.items)
      }
    }
    this.request(params)
  }

  /**
   * 
   */
  getThemeData(callback) {
    var params = {
      url: 'theme?ids=1,2,3',
      sCallback: function (data) {
        callback && callback(data)
      }
    }
    this.request(params);
  }

  /**
   * 
   */
  getproductsData(callback) {
    var params = {
      url: 'product/recent',
      sCallback: function (data) {
        callback && callback(data)
      }
    }
    this.request(params);
  }

}

export { Home };

