# Security Policy

## Supported Versions

| Version | Supported          |
| ------- | ------------------ |
| 0.1.x   | :white_check_mark: |

## Reporting a Vulnerability

The Plugin Starter Template team takes security issues seriously. We appreciate your efforts to responsibly disclose your findings.

**Please do NOT report security vulnerabilities through public GitHub issues.**

### How to Report

1. **Email**: Send a detailed report to [support@wpallstars.com](mailto:support@wpallstars.com) with the subject line "Security Vulnerability Report: plugin-starter-template".
2. **Include**:
   - A description of the vulnerability and its potential impact.
   - Detailed steps to reproduce the issue.
   - Any proof-of-concept code, if applicable.
   - Your name and contact information for follow-up (optional but appreciated).

### What to Expect

- **Acknowledgement**: We will acknowledge receipt of your report within 48 hours.
- **Assessment**: We will investigate and validate the vulnerability within 7 business days.
- **Resolution**: We aim to release a fix within 30 days of confirming the vulnerability, depending on complexity.
- **Disclosure**: We will coordinate with you on the timing of any public disclosure.

### Guidelines

- Give us reasonable time to address the issue before making any public disclosure.
- Make a good-faith effort to avoid privacy violations, data destruction, or disruption of services.
- Do not access or modify data that does not belong to you.

### Recognition

We are grateful for security researchers who help keep our users safe. With your permission, we will acknowledge your contribution in the changelog of the release that addresses the vulnerability.

## Security Best Practices for Contributors

When contributing to this project, please follow these security practices:

- Sanitize all user inputs using WordPress sanitization functions (`sanitize_text_field()`, `sanitize_email()`, `absint()`, etc.).
- Escape all output using WordPress escaping functions (`esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses()`, etc.).
- Use nonces for form submissions and AJAX requests (`wp_nonce_field()`, `wp_verify_nonce()`, `check_ajax_referer()`).
- Use prepared statements for database queries (`$wpdb->prepare()`).
- Check user capabilities before performing privileged actions (`current_user_can()`).
- Avoid using `eval()`, `extract()`, or other dangerous PHP functions.
- Keep dependencies up to date and monitor for known vulnerabilities.
