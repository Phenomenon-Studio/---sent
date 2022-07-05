const { merge } = require('webpack-merge');
const chalk = require('chalk');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const { address } = require('ip');
const webpackConfiguration = require('../webpack.config');
const environment = require('./environment');

// eslint-disable-next-line no-console
const log = console.log;
const localIP = chalk.black.bgWhite.bold(`### Your IP: ${chalk.red.underline(address())}`);

log(localIP);

module.exports = merge(webpackConfiguration, {
    mode: 'development',
    devtool: 'source-map',
    plugins: [
        new BrowserSyncPlugin(
            {
                open: 'external',
                ghostMode: false,
                notify: false,
                online: true,
                files: [
                    {
                        match: [environment.paths.source],
                        fn(event) {
                            if (event === 'change' || event === 'add' || event === 'unlink') {
                                const bs = require('browser-sync').get('bs-webpack-plugin');
                                bs.reload();
                                log(localIP);
                            }
                        },
                    },
                ],
                ...environment.server,
            },
            {
                reload: false,
            }
        ),
    ],
});
