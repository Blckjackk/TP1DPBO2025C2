from Petshop import Petshop

data = [] # Buat objek sekali di luar loop

while True:
    print("\n1. Tampilkan Produk")
    print("2. Tambah Produk")
    print("3. Ubah Produk")
    print("4. Hapus Produk")
    print("5. Keluar")

    x = int(input("Masukkan Pilihan Opsi: "))

    if x == 1:  # Menampilkan data
        if not data:  # Cek apakah list dalam Petshop kosong
            print("List nya kosong banggg!!!!\n")
        else:
            print("\nDaftar Produk di Petshop:\n")
            print("||========================||\n")

            for x in data:  # Looping dari daftar produk
                print(f"ID Product    : {x.getID()}")
                print(f"Nama Product  : {x.getNama()}")
                print(f"Jenis         : {x.getKategori()}")
                print(f"Harga         : Rp {x.getHarga()}")
                print("||========================||")

    elif x == 2:  # Menambahkan data
        T_ID = input("Masukkan ID Baru: ")
        T_Nama = input("Masukkan Nama Baru: ")
        T_Kategori = input("Masukkan Kategori Baru: ")
        T_Harga = int(input("Masukkan Harga Baru: "))

        produk = Petshop(T_ID, T_Nama, T_Kategori, T_Harga)

        data.append(produk)  # Menambahkan produk ke list
        print("Data berhasil dimasukkan\n")

    elif x == 3:  # mengubah data yang sudah ada

        search = input("Masukkan yang mau dicari : ")
        
        ketemu = False

        for produk in data:

            if produk.getID() == search:
                print("Produk ditemukan! Masukkan data baru.")

                T_Nama = input("Masukkan Nama Baru: ")
                T_Kategori = input("Masukkan Kategori Baru: ")
                T_Harga = int(input("Masukkan Harga Baru: "))

                # Update data produk
                produk.setNama(T_Nama)
                produk.setKategori(T_Kategori)
                produk.setHarga(T_Harga)

                ketemu = True
                print("Data berhasil diubah!\n")      


        if ketemu == False:
            print("Data tidak ditemukan wle\n") 

    elif x == 4:
        search = input("Masukkan ID yang ingin dihapus: ")
        ketemu = False

        for produk in data:
            if produk.getID() == search:
                data.remove(produk)  # Hapus produk dari list
                print("Produk berhasil dihapus!\n")
                ketemu = True
                break  # Keluar dari loop setelah menghapus

        if not ketemu:
            print("Produk dengan ID tersebut tidak ditemukan!\n")

            

    elif x == 5:
        print("Keluar dari program...")
        break
    else:
        print("Pilihan tidak valid, coba lagi!\n")
