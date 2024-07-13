import path, { resolve } from "path";
import { fileURLToPath } from "url";
import webpack from "webpack";
import MiniCssExtractPlugin from "mini-css-extract-plugin";
import BrowserSyncPlugin from "browser-sync-webpack-plugin";

// Definir __dirname en el contexto de ES Module
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// change this variable to fit your project

const localDomain = "http://localhost:8888/wp-base/";

// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

const { ProvidePlugin } = webpack;

export default {
  mode: "development",
  entry: {
    app: "./assets/js/index.js",
    common: "./assets/js/common.js",
    frontend: "./assets/scss/frontend.scss",
  },
  output: {
    filename: "build/[name].min.js",
    path: resolve(__dirname),
  },
  watch: true,
  devtool: "source-map",
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: { presets: ["@babel/preset-env"] },
        },
      },
      {
        test: /\.(sass|css|scss)$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "postcss-loader", // Asegúrate de tener un archivo postcss.config.js si usas PostCSS
          "sass-loader",
        ],
      },
      {
        test: /\.(png|jpg|jpeg|gif)$/,
        type: "asset/resource",
        generator: {
          filename: "build/img/[name][ext]",
        },
      },
      {
        test: /\.svg$/,
        type: "asset/resource",
        generator: {
          filename: "build/svg/[hash][ext][query]",
        },
      },
      {
        test: /\.(woff(2)?|ttf|eot)$/,
        type: "asset/resource",
        generator: {
          filename: "build/fonts/[hash][ext][query]",
        },
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "build/[name].min.css",
    }),
    new BrowserSyncPlugin(
      {
        proxy: localDomain,
        files: ["build/*.css", "build/*.js"],
        injectCss: true,
      },
      { reload: false },
    ),
    new ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
    }),
  ],
  optimization: {
    minimize: false,
  },
};
