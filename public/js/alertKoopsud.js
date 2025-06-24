// Fungsi untuk mengubah nama field menjadi format yang lebih readable
function formatFieldName(fieldName) {
    // Ubah underscore menjadi spasi
    let formatted = fieldName.replace(/_/g, ' ');
    
    // Tambahkan spasi sebelum angka (untuk _2 menjadi 2)
    formatted = formatted.replace(/(\D)(\d)/, '$1 $2');
    
    // Kapitalisasi setiap kata
    formatted = formatted.replace(/\b\w/g, char => char.toUpperCase());
    
    return formatted;
}

// Contoh penggunaan:
// formatFieldName('foto_amunisi_2') → "Foto Amunisi 2"
// formatFieldName('foto_pertahanan_udara_2') → "Foto Pertahanan Udara 2"

// Konfigurasi validasi file (dengan contoh format nama yang sudah diperbaiki)
const fileConfigs = {
    'foto': { 
        allowedTypes: ['png'], 
        maxSize: 3,
        label: 'Foto Koopsud' // Label khusus
    },
    'foto_amunisi': { 
        allowedTypes: ['jpg', 'jpeg', 'png'], 
        maxSize: 3,
        label: 'Foto Amunisi 1' 
    },
    'foto_amunisi_2': { 
        allowedTypes: ['jpg', 'jpeg', 'png'], 
        maxSize: 3,
        label: 'Foto Amunisi 2' 
    },
    'foto_pertahanan_udara': { 
        allowedTypes: ['jpg', 'jpeg', 'png'], 
        maxSize: 3,
        label: 'Foto Pertahanan Udara 1' 
    },
    'foto_pertahanan_udara_2': { 
        allowedTypes: ['jpg', 'jpeg', 'png'], 
        maxSize: 3,
        label: 'Foto Pertahanan Udara 2' 
    },
    'foto_pesawat_terbang': { 
        allowedTypes: ['jpg', 'jpeg', 'png'], 
        maxSize: 3,
        label: 'Foto Pesawat Terbang 1' 
    },
    'foto_pesawat_terbang_2': { 
        allowedTypes: ['jpg', 'jpeg', 'png'], 
        maxSize: 3,
        label: 'Foto Pesawat Terbang 2' 
    }
};

// Fungsi untuk menampilkan notifikasi error
function showAlert(message) {
    // Cek jika sudah ada alert dengan pesan yang sama
    const existingAlerts = document.querySelectorAll('.alert.alert-error');
    for (const alert of existingAlerts) {
        if (alert.querySelector('.msg').textContent === message) {
            return; // Tidak tampilkan duplikat
        }
    }

    const alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-error showAlert';
    alertDiv.innerHTML = `
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">${message}</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    `;
    
    document.body.prepend(alertDiv);
    
    setTimeout(() => {
        alertDiv.classList.add("show");
    }, 10);
    
    setTimeout(() => {
        alertDiv.classList.remove("show");
        alertDiv.classList.add("hide");
        setTimeout(() => alertDiv.remove(), 1000);
    }, 3000);
    
    alertDiv.querySelector('.close-btn').addEventListener('click', function() {
        alertDiv.classList.remove("show");
        alertDiv.classList.add("hide");
        setTimeout(() => alertDiv.remove(), 1000);
    });
}

// Validasi file
function validateFile(input) {
    if (input.files.length > 0) {
        const file = input.files[0];
        const fieldName = input.name;
        const config = fileConfigs[fieldName];
        const maxSizeBytes = config.maxSize * 1024 * 1024;
        const fileExt = file.name.split('.').pop().toLowerCase();
        
        // Gunakan label khusus jika ada, atau format otomatis
        const displayName = config.label || formatFieldName(fieldName);
        
        // Validasi tipe file
        if (!config.allowedTypes.includes(fileExt)) {
            const allowedExtensions = config.allowedTypes.map(ext => `.${ext}`).join(', ');
            showAlert(`Format ${displayName} harus ${allowedExtensions}`);
            input.value = '';
            return false;
        }
        
        // Validasi ukuran file
        if (file.size > maxSizeBytes) {
            showAlert(`Ukuran ${displayName} maksimal ${config.maxSize}MB`);
            input.value = '';
            return false;
        }
    }
    return true;
}

// Inisialisasi setelah DOM loaded
document.addEventListener('DOMContentLoaded', function() {
    // Handle existing alerts (jika ada dari server)
    const existingAlert = document.querySelector('.alert');
    if (existingAlert) {
        existingAlert.classList.add("show", "showAlert");
        setTimeout(() => {
            existingAlert.classList.remove("show");
            existingAlert.classList.add("hide");
            setTimeout(() => existingAlert.remove(), 1000);
        }, 5000);
        
        existingAlert.querySelector('.close-btn')?.addEventListener('click', function() {
            existingAlert.classList.remove("show");
            existingAlert.classList.add("hide");
            setTimeout(() => existingAlert.remove(), 1000);
        });
    }

    // Validasi semua field file
    Object.keys(fileConfigs).forEach(fieldName => {
        const input = document.querySelector(`input[name="${fieldName}"]`);
        if (input) {
            input.addEventListener('change', function() {
                validateFile(this);
            });
        }
    });

    // Validasi sebelum submit form
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            let hasError = false;
            
            // Cek semua field file
            Object.keys(fileConfigs).forEach(fieldName => {
                const input = document.querySelector(`input[name="${fieldName}"]`);
                if (input && input.files.length > 0) {
                    if (!validateFile(input)) {
                        hasError = true;
                    }
                }
            });
            
            if (hasError) {
                e.preventDefault(); // Hentikan submit jika ada error
                // Scroll ke atas untuk melihat notifikasi
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    }
});