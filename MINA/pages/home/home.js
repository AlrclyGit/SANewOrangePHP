
import { Home } from 'home-model.js';
var home = new Home();

Page({

  /**
   * 页面的初始数据
   */
  data: {

  },

  /**
   * 页面监听加载
   */
  onLoad() {
    this._loadData(); // 获取页面数据
  },

  /**
   * 获取页面数据
   */
  _loadData() {

    //
    home.getBannerData((data) => {
      this.setData({
        'bannerArr': data
      });
    });

    //
    home.getThemeData((data) => {
      this.setData({
        'themeArr': data
      });
    });

    //
    home.getproductsData((data) => {
      this.setData({
        'productsArr': data
      });
    });

  },

  /**
   * 
   */
  onProductsItemTap(event) {
    var id = home.getDataSet(event, 'id');
    wx.navigateTo({
      url: '../product/product?id=' + id,
    })
  },

  /**
   * 
   */
  onThemesItemTap(event) {
    var id = home.getDataSet(event, 'id');
    var name = home.getDataSet(event, 'name');
    wx.navigateTo({
      url: '../theme/theme?id=' + id + '&name=' + name,
    })
  },

  /**
   * 
   */
  onProductsItemTap(event) {
    var id = home.getDataSet(event, 'id');
    wx.navigateTo({
      url: '../product/product?id=' + id,
    })
  }




})


