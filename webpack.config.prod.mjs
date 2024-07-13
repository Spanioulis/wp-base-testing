import path, { resolve } from "path";
import { fileURLToPath } from "url";
import webpack from "webpack";
import MiniCssExtractPlugin from "mini-css-extract-plugin";
import CssMinimizerPlugin from "css-minimizer-webpack-plugin";

// Definir __dirname en el contexto de ES Module
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const { ProvidePlugin } = webpack;

export default {
  mode: "production",
  entry: {
    app: "./assets/js/index.js",
    common: "./assets/js/common.js",
    frontend: "./assets/scss/frontend.scss",
  },
  output: {
    filename: "./build/[name].min.js",
    path: resolve(__dirname),
  },
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
        use: [MiniCssExtractPlugin.loader, "css-loader", "postcss-loader", "sass-loader"],
      },
      {
        test: /\.(png|jpg|jpeg|gif)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              outputPath: "build/img",
              publicPath: "/build/img",
            },
          },
        ],
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
      filename: "./build/[name].min.css",
    }),
    new ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
    }),
  ],
  optimization: {
    minimize: true,
    minimizer: [
      `...`, // webpack@5 feature: extend existing minimizers (i.e. `terser-webpack-plugin`)
      new CssMinimizerPlugin(),
    ],
  },
};
