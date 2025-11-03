    {{-- Start CSS --}}
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-guest/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

    <!-- Custom Color Override -->
    <style>
    /* Global Styles */
    :root {
        --primary-color: #007bff;
        --primary-dark: #0056b3;
        --primary-light: #e7f3ff;
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --dark-color: #2c3e50;
        --light-color: #f8f9fa;
        --border-radius: 16px;
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.06);
        --shadow-md: 0 4px 20px rgba(0, 0, 0, 0.08);
        --shadow-lg: 0 8px 30px rgba(0, 0, 0, 0.12);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .content-section {
        padding-top: 180px;
        min-height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
    }

    /* Page Header Modern */
    .page-header-modern {
        animation: fadeInUp 0.6s ease;
    }

    .header-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
        color: white;
        box-shadow: 0 10px 30px rgba(0, 123, 255, 0.3);
    }

    /* Alert Modern */
    .alert-modern {
        border: none;
        border-radius: var(--border-radius);
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: var(--shadow-md);
        animation: slideInDown 0.5s ease;
    }

    .alert-modern.alert-success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        border-left: 4px solid var(--success-color);
    }

    .alert-icon {
        width: 45px;
        height: 45px;
        background: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--success-color);
        flex-shrink: 0;
    }

    .alert-content {
        flex: 1;
    }

    .alert-content strong {
        display: block;
        margin-bottom: 4px;
        color: var(--success-color);
    }

    /* Card Edit Modern */
    .card-modern {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        overflow: hidden;
        background: white;
        animation: fadeInUp 0.5s ease;
    }

    .card-edit {
        border: 2px solid #ffc107;
    }

    .card-header-modern {
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        padding: 20px 25px;
        border: none;
    }

    .header-content {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
    }

    .header-content i {
        font-size: 1.5rem;
    }

    .header-content h5 {
        margin: 0;
        font-weight: 700;
        font-size: 1.2rem;
    }

    /* Form Modern */
    .form-label-modern {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .input-group-modern {
        position: relative;
        display: flex;
        align-items: stretch;
    }

    .input-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-color);
        font-size: 1.1rem;
        z-index: 2;
    }

    .input-icon.textarea-icon {
        top: 20px;
        transform: none;
    }

    .form-control-modern {
        width: 100%;
        padding: 14px 18px 14px 50px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: var(--transition);
        background: white;
    }

    .form-control-modern:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px var(--primary-light);
        outline: none;
    }

    textarea.form-control-modern {
        resize: vertical;
        min-height: 100px;
    }

    /* Button Modern */
    .btn-modern {
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
    }

    .btn-secondary-modern {
        background: #6c757d;
        color: white;
        box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
    }

    .btn-secondary-modern:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }

    /* Action Bar */
    .action-bar {
        background: white;
        padding: 25px 30px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* Card Warga */
    .card-warga {
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card-warga:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }

    .card-warga-header {
        padding: 25px;
        background: linear-gradient(135deg, var(--primary-light) 0%, #f0f7ff 100%);
        display: flex;
        align-items: center;
        gap: 15px;
        border-bottom: 1px solid rgba(0, 123, 255, 0.1);
    }

    .user-avatar-modern {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    .user-info {
        flex: 1;
        min-width: 0;
    }

    .user-name {
        font-weight: 700;
        color: var(--dark-color);
        margin: 0 0 8px 0;
        font-size: 1.1rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .badge-gender {
        display: inline-flex;
        align-items: center;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-male {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        color: #1976d2;
    }

    .badge-female {
        background: linear-gradient(135deg, #fce4ec 0%, #f8bbd0 100%);
        color: #c2185b;
    }

    .card-warga-body {
        padding: 25px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }

    .info-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .info-icon.bg-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    }

    .info-icon.bg-success {
        background: linear-gradient(135deg, #28a745, #218838);
    }

    .info-icon.bg-warning {
        background: linear-gradient(135deg, #ffc107, #ff9800);
    }

    .info-content {
        flex: 1;
        min-width: 0;
    }

    .info-label {
        display: block;
        font-size: 0.8rem;
        color: #6c757d;
        font-weight: 500;
        margin-bottom: 4px;
    }

    .info-value {
        display: block;
        font-weight: 600;
        color: var(--dark-color);
        font-size: 0.95rem;
        word-break: break-word;
    }

    .card-warga-footer {
        padding: 20px 25px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        display: flex;
        gap: 10px;
    }

    .btn-action {
        flex: 1;
        padding: 10px 16px;
        border-radius: 10px;
        border: none;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-action-edit {
        background: linear-gradient(135deg, #e7f3ff 0%, #cfe7ff 100%);
        color: var(--primary-color);
    }

    .btn-action-edit:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    .btn-action-delete {
        background: linear-gradient(135deg, #ffe5e5 0%, #ffcccc 100%);
        color: var(--danger-color);
    }

    .btn-action-delete:hover {
        background: var(--danger-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    }

    /* Empty State */
    .empty-state-modern {
        text-align: center;
        padding: 80px 20px;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
    }

    .empty-icon {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, var(--primary-light) 0%, #e0f0ff 100%);
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        font-size: 3rem;
        color: var(--primary-color);
    }

    .empty-title {
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 12px;
    }

    .empty-text {
        color: #6c757d;
        margin-bottom: 30px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .content-section {
            padding-top: 140px;
        }

        .action-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .action-left,
        .action-right {
            width: 100%;
            text-align: center;
        }

        .btn-modern {
            width: 100%;
        }

        .card-warga-header {
            flex-direction: column;
            text-align: center;
        }

        .user-name {
            white-space: normal;
        }
    }

    /* Card Edit Styling dengan warna kuning */
    .card-edit .card-header-modern {
        background: linear-gradient(135deg, #1dc7e9, #0a4465) !important;
    }

    .card-create .card-header-modern {
        background: linear-gradient(135deg, #23be97, #107e63) !important;
    }

    .alert-modern.alert-danger {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        border-left: 4px solid var(--danger-color);
    }

    .alert-modern.alert-danger .alert-icon {
        color: var(--danger-color);
    }

    .alert-modern.alert-danger strong {
        color: var(--danger-color);
    }

    .alert-modern ul {
        margin: 0;
        padding-left: 20px;
    }

    .alert-modern ul li {
        margin-bottom: 4px;
    }

    .text-danger.small {
        font-size: 0.875rem;
        margin-top: 8px;
        display: block;
    }

    /* Form validation states */
    .form-control-modern.is-invalid {
        border-color: var(--danger-color);
        box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1);
    }

    /* Ensure consistent spacing */
    .content-section {
        padding-top: 180px;
        min-height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
    }

    /* Action bar consistency */
    .action-bar {
        background: white;
        padding: 25px 30px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 30px;
    }

    .action-left h4 {
        color: var(--dark-color);
        margin-bottom: 8px;
    }

    .action-left p {
        color: #6c757d;
        margin: 0;
    }

    /* Card modern consistency */
    .card-modern {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        overflow: hidden;
        background: white;
        animation: fadeInUp 0.5s ease;
        margin-bottom: 30px;
    }

    .card-header-modern {
        padding: 20px 25px;
        border: none;
    }

    .header-content {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
    }

    .header-content i {
        font-size: 1.5rem;
    }

    .header-content h5 {
        margin: 0;
        font-weight: 700;
        font-size: 1.2rem;
    }

    /* Form consistency */
    .form-label-modern {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 10px;
        font-size: 0.95rem;
        display: block;
    }

    .input-group-modern {
        position: relative;
        display: flex;
        align-items: stretch;
        width: 100%;
    }

    .input-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-color);
        font-size: 1.1rem;
        z-index: 2;
    }

    .input-icon.textarea-icon {
        top: 20px;
        transform: none;
    }

    .form-control-modern {
        width: 100%;
        padding: 14px 18px 14px 50px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: var(--transition);
        background: white;
        font-family: inherit;
    }

    .form-control-modern:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px var(--primary-light);
        outline: none;
    }

    select.form-control-modern {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }

    textarea.form-control-modern {
        resize: vertical;
        min-height: 120px;
        padding-top: 14px;
    }

    /* Button consistency */
    .btn-modern {
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        font-family: inherit;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-secondary-modern {
        background: #6c757d;
        color: white;
        box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
    }

    .btn-secondary-modern:hover {
        background: #5a6268;
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
    }

    /* Page header consistency */
    .page-header-modern {
        animation: fadeInUp 0.6s ease;
        margin-bottom: 50px;
    }

    .header-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
        color: white;
        box-shadow: 0 10px 30px rgba(0, 123, 255, 0.3);
    }

    /* Animation consistency */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive fixes */
    @media (max-width: 768px) {
        .content-section {
            padding-top: 140px;
        }

        .action-bar {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }

        .action-left,
        .action-right {
            width: 100%;
        }

        .btn-modern {
            width: 100%;
            justify-content: center;
        }

        .header-content {
            justify-content: center;
            text-align: center;
        }

        .card-body {
            padding: 20px !important;
        }
    }

    .floating-whatsapp {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 1000;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .whatsapp-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 15px;
        }

        .whatsapp-main-button {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            border: 3px solid white;
            text-decoration: none;
        }

        .whatsapp-main-button:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 30px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-main-button i {
            font-size: 28px;
            color: white;
        }

        .whatsapp-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #FF4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid white;
            animation: pulse-badge 2s infinite;
        }

        .whatsapp-tooltip {
            background: white;
            padding: 12px 16px;
            border-radius: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            max-width: 250px;
            opacity: 0;
            transform: translateX(20px);
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .whatsapp-container:hover .whatsapp-tooltip {
            opacity: 1;
            transform: translateX(0);
        }

        .whatsapp-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #25D366, #128C7E);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .whatsapp-avatar i {
            font-size: 20px;
            color: white;
        }

        .whatsapp-info {
            flex: 1;
        }

        .whatsapp-info h4 {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
            color: #25D366;
        }

        .whatsapp-info p {
            margin: 2px 0 0 0;
            font-size: 12px;
            color: #666;
            line-height: 1.3;
        }

        .whatsapp-status {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 3px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #4CAF50;
            animation: blink 2s infinite;
        }

        .status-text {
            font-size: 11px;
            color: #4CAF50;
            font-weight: 500;
        }

        .whatsapp-chat-bubble {
            background: #25D366;
            color: white;
            padding: 8px 12px;
            border-radius: 18px 18px 0 18px;
            font-size: 12px;
            margin-top: 8px;
            position: relative;
            animation: slideIn 0.5s ease;
        }

        .whatsapp-chat-bubble::after {
            content: '';
            position: absolute;
            bottom: -5px;
            right: 10px;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #25D366;
        }

        /* Animations */
        @keyframes pulse-badge {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        @keyframes blink {
            0%, 50% {
                opacity: 1;
            }
            51%, 100% {
                opacity: 0.3;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        .whatsapp-main-button {
            animation: float 3s ease-in-out infinite;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .floating-whatsapp {
                bottom: 20px;
                right: 15px;
            }

            .whatsapp-main-button {
                width: 55px;
                height: 55px;
            }

            .whatsapp-main-button i {
                font-size: 24px;
            }

            .whatsapp-tooltip {
                max-width: 220px;
                padding: 10px 14px;
            }
        }
</style>
