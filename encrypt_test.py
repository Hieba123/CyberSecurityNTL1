import os
import subprocess
import shutil

# Funktion zum Verschlüsseln eines Ordners und des ZIP-Archivs mit 7-Zip
def encrypt_folder(folder_path, zip_password):
    # Dateiname für das verschlüsselte Archiv
    zip_filename = folder_path + '_encrypted.zip'
    # Temporärer Ordner für den Inhalt
    temp_folder = folder_path + '_temp'

    # Kopiere den Inhalt des ursprünglichen Ordners in den temporären Ordner
    shutil.copytree(folder_path, temp_folder)

    # Erstelle ein neues ZIP-Archiv mit dem Inhalt des temporären Ordners
    subprocess.run(['7z', 'a', '-r', '-p{}'.format(zip_password), zip_filename, temp_folder])

    # Lösche den temporären Ordner
    shutil.rmtree(temp_folder)

    # Lösche den ursprünglichen Ordner
    shutil.rmtree(folder_path)

    print('Verschlüsselung abgeschlossen. Der ursprüngliche Ordner wurde gelöscht.')


# Pfad zum zu verschlüsselnden Ordner
folder_path = 'S:\\secret'

# Passwort für die Verschlüsselung des ZIP-Archivs
zip_password = 'htl123'

# Verschlüssele den Ordner und das ZIP-Archiv mit 7-Zip
encrypt_folder(folder_path, zip_password)
