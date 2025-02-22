public class Petshop {
    
    private String ID;
    private String nama_product;
    private String kategori_product;
    private int Harga_product;

    Petshop(){
        this.ID = "";
        this.nama_product = "";
        this.kategori_product = "";
        this.Harga_product = 0;
    }

    Petshop(String ID, String nama_product, String kategori_product, int Harga_product){
        this.ID = ID;
        this.nama_product = nama_product;
        this.kategori_product = kategori_product;
        this.Harga_product = Harga_product;
    }

    public void setHarga_product(int harga_product) {
        Harga_product = harga_product;
    }

    public void setID(String iD) {
        ID = iD;
    }
    
    public void setKategori_product(String kategori_product) {
        this.kategori_product = kategori_product;
    }

    public void setNama_product(String nama_product) {
        this.nama_product = nama_product;
    }

    public String getID() {
        return ID;
    }

    public String getKategori_product() {
        return kategori_product;
    }

    public String getNama_product() {
        return nama_product;
    }

    public int getHarga_product() {
        return Harga_product;
    }

    public void Ingfo(){
        System.out.println("ID          : "+ ID );
        System.out.println("Nama        : "+ nama_product);
        System.out.println("Kategori    : "+ kategori_product);
        System.out.println("Harga       : "+ Harga_product);
        System.out.println("//=================//");
    }


}
