/** @type {import('tailwindcss').Config} */
export default {
  content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: {
        mono: ['"DM Mono"', 'monospace'],
        serif: ['Fraunces', 'serif'],
      },
      colors: {
        bg: 'var(--color-bg)',
        surface: 'var(--color-surface)',
        border: 'var(--color-border)',
        muted: 'var(--color-muted)',
        dim: 'var(--color-dim)',
        base: 'var(--color-base)',
        bright: 'var(--color-bright)',
        gold: '#d4a96a',
        blue: '#6a9fd4',
      },
      keyframes: {
        fadeUp: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
      },
      animation: {
        'fade-up': 'fadeUp 0.8s ease both',
        'fade-up-1': 'fadeUp 0.8s 0.15s ease both',
        'fade-up-2': 'fadeUp 0.8s 0.30s ease both',
        'fade-up-3': 'fadeUp 0.8s 0.45s ease both',
      },
    },
  },
  plugins: [],
};
