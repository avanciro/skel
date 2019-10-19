const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const FixStyleOnlyEntriesPlugin = require("webpack-fix-style-only-entries")
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin')

module.exports = {
    mode: 'development',
    watch: true,
    entry: {
        'core': path.resolve("views", "assets", "css", "core.scss")
    },
    output: {
        path: path.resolve("views", "assets", "dist", "css")
    },
    optimization: {
        minimizer: [
            new OptimizeCSSAssetsPlugin({
                cssProcessorPluginOptions: {
                    preset: ['default', { discardComments: { removeAll: true } }]
                }
            })
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].min.css',
            ignoreOrder: false
        }),
        new OptimizeCSSAssetsPlugin(),
        new FixStyleOnlyEntriesPlugin()
    ],
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader'
                ]
            }
        ]
    },
    devServer: {
        contentBase: path.resolve("views", "assets", 'dist'),
        host: '0.0.0.0',
        port: 9000,
        liveReload: true,
        compress: true
    }
}