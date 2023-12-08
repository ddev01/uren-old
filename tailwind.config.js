/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: ['./resources/views/**/*.blade.php', './App/View/**/*.php', './App/Livewire/**/*.php', './resources/js/**/*.js', './resources/css/**/*.css'],

    theme: {
        extend: {
            fontFamily: {
                poppins: ['Poppins', 'system-ui', 'sans-serif'],
                inter: ['Inter', 'system-ui', 'sans-serif'],
            },
            zIndex: {
                1: '1',
                '-1': '-1',
                2: '2',
                '-2': '-2',
                3: '3',
                '-3': '-3',
                4: '4',
                '-4': '-4',
                5: '5',
                '-5': '-5',
                6: '6',
                '-6': '-6',
                7: '7',
                '-7': '-7',
                8: '8',
                '-8': '-8',
                9: '9',
                '-9': '-9',
            },
        },
    },

    plugins: [
        function ({ addUtilities }) {
            const newFlexItems = {
                '.flexc': {
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                },
                '.flexb': {
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'space-between',
                },
                '.flexx': {
                    display: 'flex',
                    justifyContent: 'center',
                },
                '.flexy': {
                    display: 'flex',
                    alignItems: 'center',
                },
                '.colc': {
                    display: 'flex',
                    flexDirection: 'column',
                    alignItems: 'center',
                    justifyContent: 'center',
                },
                '.colb': {
                    display: 'flex',
                    flexDirection: 'column',
                    alignItems: 'center',
                    justifyContent: 'space-between',
                },
                '.colx': {
                    display: 'flex',
                    flexDirection: 'column',
                    alignItems: 'center',
                },
                '.coly': {
                    display: 'flex',
                    flexDirection: 'column',
                    justifyContent: 'center',
                },
            };
            addUtilities(newFlexItems);
        },
        function ({ addVariant, e }) {
            addVariant('placeholder-shown', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.${e(`placeholder-shown${separator}${className}`)}:placeholder-shown`;
                });
            });
        },
    ],
};
