const path = require('path');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const config = {
  entry: {
    index: './app/index.js', 
  },
  output: {
    filename: '[name].bundle.js',
    chunkFilename: '[name].bundle.js',
    path: path.resolve(__dirname, 'dist')
  },
  mode: 'development',
  plugins: [
    new UglifyJSPlugin(), 
    new MiniCssExtractPlugin({ filename:'[name].bundle.css' })
  ],
  module: {
    rules: [{
      test: /\.js$/,
      exclude: /node_modules/,
      loader: 'babel-loader',

      options: {
        presets: ['env']
      }
    }, {
      test: /\.(s[ca]ss|css)$/,

      use: [{
        loader: MiniCssExtractPlugin.loader
      }, {
        loader: 'css-loader',

        options: {
          sourceMap: true
        }
      }, {
        loader: 'sass-loader',

        options: {
          sourceMap: true
        }
      }]
    }]
  }
}

module.exports = config;