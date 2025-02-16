#include "petshop.cpp"
#include <vector>

vector<petshop> DataPetshop; // Menggunakan vector agar lebih fleksibel

void printAwalan(){
    cout << endl;
    cout << "Input 1 untuk menampilkan data yang tersedia" << endl;
    cout << "Input 2 untuk menambahkan data baru" << endl;
    cout << "Input 3 untuk mengubah data yang sudah ada" << endl;
    cout << "Input 4 untuk menghapus data baru" << endl;
    cout << "ketik 5 untuk mencari data yang sudah ada" << endl;
    cout << "ketik 6 untuk Berhenti" << endl << endl;
}

void MencariData(){
    string ID;
    cout << "Masukkan inputan ID produk yang ingin dicarii: ";
    cin >> ID;

    bool ketemuGa = false;
    int tandaDataKeberapa=0;

    int SelesaiLoop = 0;
    int i = 0;

    while (SelesaiLoop == 0 && i < DataPetshop.size())
    {
        if (DataPetshop[i].get_id() == ID) {
            string nama_product, kategori_product;
            int Harga_product;
            
            cout << "Data ditemukan!!" << endl;
            cout << "ID Product    : " <<  DataPetshop[i].get_id() << endl;
            cout << "Nama Product  : " <<  DataPetshop[i].get_nama_product() << endl;
            cout << "Jenis         : " <<  DataPetshop[i].get_kategori_product() << endl;
            cout << "Harga         : Rp " << DataPetshop[i].get_harga_product() << endl;
            cout << "//=================================//" << endl;

            ketemuGa = true;
            
            SelesaiLoop = 1;
            tandaDataKeberapa = i;
        }

        i++;
    }

    if (!ketemuGa)
    {
        cout << "Data Tidak ditemukan!!" << endl;
    }
}

void MenghapusData(){
    string ID;
    cout << "Masukkan inputan ID produk yang ingin dihapush: ";
    cin >> ID;

    bool ketemuGa = false;
    int tandaDataKeberapa=0;
    // while (SelesaiLoop == 0 && i < DataPetshop.size())
    // {
    //     if (DataPetshop[i].get_id() == ID) {

    //         for (int j = i; j < DataPetshop.size(); j++)
    //         {
    //             DataPetshop[j].set_nama_product(DataPetshop[j+1].get_nama_product());
    //             DataPetshop[j].set_kategori_product(DataPetshop[j+1].get_kategori_product());
    //             DataPetshop[j].set_harga_product(DataPetshop[j+1].get_harga_product());
    //         }

    //         dan hapus data terakhir
            
    //         cout << "Data berhasil dihapus!" << endl;
    //         ketemuGa = true;
            
    //         SelesaiLoop = 1;
    //     }else{
    //         i++;
    //     }
    // }

    int i = 0;
    int SelesaiLoop = 0;
    while (i < DataPetshop.size() && SelesaiLoop == 0) {
        if (DataPetshop[i].get_id() == ID) {
            // Menggunakan fungsi erase
            DataPetshop.erase(DataPetshop.begin() + i);
            cout << "Data berhasil dihapus!" << endl;
            ketemuGa = true;
            SelesaiLoop = 1;
        }
        i++; // Pindah ke elemen berikutnya
    }

    if (!ketemuGa) {
        cout << "ID dengan inputan tersebut tidak ada!!!" << endl;
    }
}

void MengubahData(){
            string ID;
            cout << "Masukkan inputan ID produk yang ingin diubah: ";
            cin >> ID;

            bool ketemuGa = false;
            int tandaDataKeberapa=0;

            int SelesaiLoop = 0;
            int i = 0;

            while (SelesaiLoop == 0 && i < DataPetshop.size())
            {
                if (DataPetshop[i].get_id() == ID) {
                    string nama_product, kategori_product;
                    int Harga_product;

                    cout << "Masukkan Nama Baru: ";
                    cin.ignore();
                    getline(cin, nama_product);
                    cout << "Masukkan Kategori Baru: ";
                    getline(cin, kategori_product);
                    cout << "Masukkan Harga Baru: ";
                    cin >> Harga_product;

                    // Update data
                    DataPetshop[i] = petshop(ID, nama_product, kategori_product, Harga_product);
                    cout << "Data berhasil diperbarui!" << endl;
                    ketemuGa = true;
                    
                    SelesaiLoop = 1;
                    tandaDataKeberapa = i;
                }

                i++;
            }
            
            if (!ketemuGa) {
                cout << "ID dengan inputan tersebut tidak adaa!!!" << endl;
            }else{
                cout << "Data Sudah diganti" << endl;
                cout << DataPetshop[tandaDataKeberapa].get_id() << endl;
                cout << DataPetshop[tandaDataKeberapa].get_nama_product() << endl;
                cout << DataPetshop[tandaDataKeberapa].get_kategori_product() << endl;
                cout << DataPetshop[tandaDataKeberapa].get_harga_product() << endl;

                cout << "Arigatoww" << endl;
            }
}

void MenambahkanData(){
    // contoh
    // Petshop p2("Anjing", "Hewan Darat", 150000);
    // daftarPetshop.push_back(p2);

    string ID, nama_product, kategori_product;
    int Harga_product;


    cout << "Masukkan ID: ";
    cin >> ID;
    cin.ignore();

    cout << "Masukkan Nama Produk: ";
    getline(cin, nama_product);

    cout << "Masukkan Kategori Produk: ";
    getline(cin, kategori_product);

    cout << "Masukkan Harga Produk: ";
    cin >> Harga_product;

    petshop temp(ID, nama_product, kategori_product, Harga_product);
    DataPetshop.push_back(temp);
}

void MenampilkanData(){
    if (DataPetshop.empty()) { // Menggunakan .empty() untuk cek apakah vector kosong
        cout << "Isi Nya Kosong!" << endl;
    } else {
        cout << "\nDaftar Produk di Petshop:" << endl;
        cout << "||========================||" << endl;


        for (int i = 0; i < DataPetshop.size(); i++) {
            cout << "ID Product    : " << DataPetshop[i].get_id() << endl;
            cout << "Nama Product  : " << DataPetshop[i].get_nama_product() << endl;
            cout << "Jenis         : " << DataPetshop[i].get_kategori_product() << endl;
            cout << "Harga         : Rp " << DataPetshop[i].get_harga_product() << endl;
            cout << "||========================||" << endl;
        }
    }
}

int main(){

    int input = 0;
    do
    {
        printAwalan();
        cin >> input;

        if (input == 1) // menampilkan data yang tersedia
        {
            MenampilkanData();
        }else if (input == 2) // menambahkan data baru
        {
            MenambahkanData();
        }else if (input == 3) // mengubah data yang sudah ada
        {
            MengubahData();
        }else if (input == 4) // menghapus data baru
        {
            MenghapusData();
        }else if (input == 5) // mencari data yang sudah ada
        {
            MencariData();
        }else if (input == 6){ // Exit
            cout << "Terimakasih sudah make proggram guwa" << endl;
        }else{
            cout << "Error!" << endl;
        }
        
        
    } while (input != 6);
    
    return 0;
}