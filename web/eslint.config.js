import js from '@eslint/js';
import globals from "globals";

export default [
    {
        languageOptions: {
            ecmaVersion: 2021,
            sourceType: "module",
            globals: {
                ...globals.browser,
                ...globals.node,
                ...globals.jquery
            }
        }
    },
    {
        name: 'app/files-to-lint',
        files: ['**/*.{js,mjs}'],
    },

    {
        name: 'app/files-to-ignore',
        ignores: [
            '**/dist/**',
            '**/dist-ssr/**',
            '**/vendorJS/**',
            '**/node_modules/**',
            'gulpfile.js',
            'assets/**'
        ],
    },
    js.configs.recommended,
    {
        rules: {
            "max-len": ["warn", { "code": 120, "ignoreUrls": true }],
            semi: ["warn", "always"],
            "no-unused-vars": ["warn", { "args": "none" }]
        }
    }
];
