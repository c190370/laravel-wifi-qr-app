<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WiFi QR Code Generator</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .wifi-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            padding: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .qr-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        #qrcode {
            text-align: center;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-generate {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: bold;
            transition: transform 0.2s;
        }
        .btn-generate:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .wifi-info {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
            backdrop-filter: blur(10px);
        }
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; }
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header -->
                <div class="text-center mb-5">
                    <h1 class="display-4 text-primary mb-3">
                        <i class="bi bi-wifi me-3"></i>WiFi QR Code Generator </br>
                       <p style="font-size: 23px;"> Created and deployed by Full stack engineer</p>
                        Mr. Bittu Tamrakar
                    </h1>
                    <p class="lead text-muted">Generate QR codes for easy WiFi sharing</p>
                </div>

                <div class="row">
                    <!-- Form Section -->
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title mb-0">
                                    <i class="bi bi-gear-fill me-2"></i>WiFi Settings
                                </h4>
                            </div>
                            <div class="card-body">
                                <form id="wifiForm">
                                    <!-- Network Name -->
                                    <div class="mb-4">
                                        <label for="ssid" class="form-label">
                                            <i class="bi bi-router me-1"></i>Network Name (SSID)
                                        </label>
                                        <input type="text"
                                               class="form-control"
                                               id="ssid"
                                               placeholder="Enter WiFi network name"
                                               required>
                                        <div class="form-text">The name of your WiFi network</div>
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-4">
                                        <label for="password" class="form-label">
                                            <i class="bi bi-lock-fill me-1"></i>Password
                                        </label>
                                        <div class="input-group">
                                            <input type="password"
                                                   class="form-control"
                                                   id="password"
                                                   placeholder="Enter WiFi password">
                                            <button class="btn btn-outline-secondary"
                                                    type="button"
                                                    id="togglePassword">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        <div class="form-text">Leave empty for open networks</div>
                                    </div>

                                    <!-- Security Type -->
                                    <div class="mb-4">
                                        <label for="security" class="form-label">
                                            <i class="bi bi-shield-fill me-1"></i>Security Type
                                        </label>
                                        <select class="form-select" id="security">
                                            <option value="WPA">WPA/WPA2 (Recommended)</option>
                                            <option value="WEP">WEP (Legacy)</option>
                                            <option value="nopass">Open Network (No Password)</option>
                                        </select>
                                    </div>

                                    <!-- Hidden Network -->
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="hidden">
                                        <label class="form-check-label" for="hidden">
                                            <i class="bi bi-eye-slash me-1"></i>Hidden Network
                                        </label>
                                    </div>

                                    <!-- Generate Button -->
                                    <button type="submit" class="btn btn-primary btn-generate w-100">
                                        <i class="bi bi-qr-code me-2"></i>Generate QR Code
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- QR Code Section -->
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-success text-white">
                                <h4 class="card-title mb-0">
                                    <i class="bi bi-qr-code me-2"></i>WiFi QR Code
                                </h4>
                            </div>
                            <div class="card-body text-center">
                                <div id="qrcode-container" class="d-none">
                                    <div class="qr-container mb-3">
                                        <div id="qrcode"></div>
                                    </div>

                                    <!-- WiFi Info Display -->
                                    <div id="wifi-info" class="wifi-info">
                                        <h5 class="text-primary mb-3">Network Information</h5>
                                        <div class="row text-start">
                                            <div class="col-sm-6">
                                                <strong>Network:</strong>
                                                <p id="display-ssid" class="mb-2"></p>
                                            </div>
                                            <div class="col-sm-6">
                                                <strong>Security:</strong>
                                                <p id="display-security" class="mb-2"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="mt-3 no-print">
                                        <button class="btn btn-outline-primary me-2" onclick="downloadQR()">
                                            <i class="bi bi-download me-1"></i>Download
                                        </button>
                                        <button class="btn btn-outline-success" onclick="printCard()">
                                            <i class="bi bi-printer me-1"></i>Print WiFi Card
                                        </button>
                                    </div>
                                </div>

                                <div id="placeholder" class="text-muted">
                                    <i class="bi bi-qr-code display-1 mb-3"></i>
                                    <h5>QR Code will appear here</h5>
                                    <p>Fill in the WiFi details and click "Generate QR Code"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Instructions -->
                <div class="row mt-4 no-print">
                    <div class="col-12">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="bi bi-info-circle-fill me-2"></i>How to use
                                </h5>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <strong>1. Generate:</strong> Fill in your WiFi details and generate the QR code
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <strong>2. Scan:</strong> Point your phone's camera at the QR code
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <strong>3. Connect:</strong> Your device will automatically connect to WiFi
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- QR Code JS Library - Using a more reliable CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('wifiForm').addEventListener('submit', function(e) {
                e.preventDefault();
                generateQRCode();
            });

            // Toggle password visibility
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordField = document.getElementById('password');
                const icon = this.querySelector('i');

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    icon.className = 'bi bi-eye-slash';
                } else {
                    passwordField.type = 'password';
                    icon.className = 'bi bi-eye';
                }
            });

            // Auto-disable password field for open networks
            document.getElementById('security').addEventListener('change', function() {
                const passwordField = document.getElementById('password');
                if (this.value === 'nopass') {
                    passwordField.disabled = true;
                    passwordField.value = '';
                } else {
                    passwordField.disabled = false;
                }
            });
        });

        function generateQRCode() {
            const ssid = document.getElementById('ssid').value.trim();
            const password = document.getElementById('password').value;
            const security = document.getElementById('security').value;
            const hidden = document.getElementById('hidden').checked;

            console.log('Generating QR code with:', { ssid, password, security, hidden });

            if (!ssid) {
                alert('Please enter a network name (SSID)');
                document.getElementById('ssid').focus();
                return;
            }

            try {
                // Create WiFi QR code string
                let wifiString = `WIFI:T:${security};S:${ssid};P:${password};H:${hidden ? 'true' : 'false'};`;
                console.log('WiFi String:', wifiString);

                // Clear previous QR code
                document.getElementById('qrcode').innerHTML = '';

                // Create canvas element
                const canvas = document.createElement('canvas');
                canvas.width = 256;
                canvas.height = 256;
                canvas.style.maxWidth = '100%';
                canvas.style.height = 'auto';

                // Generate QR code using QRious
                const qr = new QRious({
                    element: canvas,
                    value: wifiString,
                    size: 256,
                    background: 'white',
                    foreground: 'black',
                    level: 'M'
                });

                // Add canvas to container
                document.getElementById('qrcode').appendChild(canvas);

                // Show QR code container and hide placeholder
                document.getElementById('qrcode-container').classList.remove('d-none');
                document.getElementById('placeholder').style.display = 'none';

                // Update info display
                document.getElementById('display-ssid').textContent = ssid;
                document.getElementById('display-security').textContent = security === 'nopass' ? 'Open Network' : security.toUpperCase();

                console.log('QR Code generated successfully!');

            } catch (error) {
                console.error('Error generating QR code:', error);
                alert('Error generating QR code. Please check your inputs and try again.');
            }
        }

        function downloadQR() {
            const canvas = document.querySelector('#qrcode canvas');
            if (canvas) {
                const link = document.createElement('a');
                link.download = `wifi-qr-${document.getElementById('ssid').value.replace(/[^a-zA-Z0-9]/g, '_')}.png`;
                link.href = canvas.toDataURL('image/png');
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            } else {
                alert('No QR code to download. Please generate a QR code first.');
            }
        }

        function printCard() {
            if (document.querySelector('#qrcode canvas')) {
                window.print();
            } else {
                alert('No QR code to print. Please generate a QR code first.');
            }
        }

        // Test function - you can call this from browser console to test
        function testQR() {
            document.getElementById('ssid').value = 'TestNetwork';
            document.getElementById('password').value = 'testpassword';
            generateQRCode();
        }
    </script>
</body>
</html>
