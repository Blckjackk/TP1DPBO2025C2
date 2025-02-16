#include <iostream> 
#include <string>

using namespace std;

class petshop
{
private:
    string ID;
    string nama_product;
    string kategori_product;
    int Harga_product;

public:

    
    petshop(){
        this->ID = "";
        this->nama_product = "";
        this->kategori_product = "";
        this->Harga_product = 0;
    }

    petshop(string ID, string nama_product, string kategori_product, int Harga_product){
        this->ID = ID;
        this->nama_product = nama_product;
        this->kategori_product = kategori_product;
        this->Harga_product = Harga_product;
    }

    // Getter
    string get_id(){
        return this->ID;
    }

    string get_nama_product(){
        return this->nama_product;
    }

    string get_kategori_product(){
        return this->kategori_product;
    }

    int get_harga_product(){
        return this->Harga_product;
    }

    // Setter
    void set_id(string ID){
         this->ID = ID;
    }

    void set_nama_product(string nama_product){
         this->nama_product = nama_product;
    }

    void set_kategori_product(string kategori){
         this->kategori_product = kategori;
    }

    void set_harga_product(int harga){
         this->Harga_product = harga;
    }

    ~petshop(){

    }
};

