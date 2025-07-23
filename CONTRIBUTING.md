# Contributing to Zyn TALL Stack Starter Kit

Thank you for your interest in contributing to Zyn TALL Stack Starter Kit! We welcome contributions from the community and are grateful for your support.

## 🤝 How to Contribute

### Reporting Bugs

Before reporting a bug, please:

1. **Search existing issues** to avoid duplicates
2. **Use the latest version** of the starter kit
3. **Provide detailed information** including:
    - Steps to reproduce
    - Expected behavior
    - Actual behavior
    - Environment details (PHP version, Laravel version, etc.)
    - Screenshots (if applicable)

### Suggesting Features

When suggesting new features:

1. **Check if it aligns** with the project's goals
2. **Provide detailed description** of the feature
3. **Explain the use case** and benefits
4. **Consider implementation complexity**

### Code Contributions

#### Getting Started

1. **Fork** the repository
2. **Clone** your fork locally
3. **Create a new branch** for your feature/bugfix
4. **Make your changes**
5. **Test thoroughly**
6. **Submit a pull request**

#### Development Setup

```bash
# Clone your fork
git clone https://github.com/YOUR_USERNAME/zyn-starter-kits.git
cd zyn-starter-kits

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed

# Start development
npm run dev
php artisan serve
```

#### Coding Standards

-   Follow **PSR-12** coding standards
-   Use **meaningful variable names**
-   Write **clear comments** for complex logic
-   Follow **Laravel best practices**
-   Use **type hints** where appropriate

#### Testing

-   Write **tests** for new features
-   Ensure **existing tests pass**
-   Aim for good **test coverage**

```bash
# Run tests
php artisan test

# Run with coverage
php artisan test --coverage
```

#### Commit Guidelines

Use clear and descriptive commit messages:

```
type(scope): brief description

Detailed explanation if needed

- List any breaking changes
- Reference issues: Fixes #123
```

**Types:**

-   `feat`: New feature
-   `fix`: Bug fix
-   `docs`: Documentation changes
-   `style`: Code style changes
-   `refactor`: Code refactoring
-   `test`: Adding or updating tests
-   `chore`: Maintenance tasks

**Examples:**

```
feat(auth): add two-factor authentication

fix(livewire): resolve component state issue

docs(readme): update installation instructions
```

## 🎯 Development Guidelines

### Code Structure

-   **Controllers**: Keep thin, delegate to services
-   **Livewire Components**: Follow single responsibility principle
-   **Models**: Use Eloquent relationships properly
-   **Services**: Extract complex business logic
-   **Traits**: Make reusable and focused

### Laravel Conventions

-   Use **Eloquent relationships** over manual queries
-   Follow **RESTful conventions** for routes
-   Use **Form Requests** for validation
-   Implement **proper error handling**
-   Use **Laravel's built-in features** when possible

### Frontend Guidelines

-   Follow **TailwindCSS best practices**
-   Keep **Alpine.js code minimal**
-   Ensure **responsive design**
-   Test on **multiple browsers**
-   Optimize for **performance**

## 📋 Pull Request Process

1. **Update documentation** if needed
2. **Add/update tests** for your changes
3. **Ensure all tests pass**
4. **Update CHANGELOG.md** with your changes
5. **Request review** from maintainers

### PR Template

When submitting a PR, include:

-   **Description** of changes
-   **Type of change** (bugfix, feature, docs, etc.)
-   **Testing performed**
-   **Screenshots** (for UI changes)
-   **Breaking changes** (if any)

## 🚀 Release Process

1. **Version bump** following semantic versioning
2. **Update CHANGELOG.md**
3. **Create release notes**
4. **Tag the release**
5. **Announce on community channels**

## 🆘 Getting Help

If you need help:

1. **Check the documentation** first
2. **Search existing issues**
3. **Ask in discussions**
4. **Contact maintainers** if needed

## 📜 Code of Conduct

By participating in this project, you agree to abide by our Code of Conduct:

-   **Be respectful** and inclusive
-   **Welcome newcomers**
-   **Give constructive feedback**
-   **Focus on what's best** for the community
-   **Show empathy** towards others

## 🎖️ Recognition

Contributors will be:

-   **Listed in CONTRIBUTORS.md**
-   **Mentioned in release notes**
-   **Thanked in community updates**

Thank you for contributing to Zyn TALL Stack Starter Kit! 🙏
