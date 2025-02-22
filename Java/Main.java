import java.util.ArrayList;
import java.util.Scanner;


public class Main {

    /**
     * @param args
     */
    public static void main(String[] args) {

        ArrayList<Petshop> Data = new ArrayList<>();
        String Pilihan;
        Scanner Scan = new Scanner(System.in);


        do{
            System.out.println();
            System.out.println("Input 1 untuk menampilkan data yang tersedia");
            System.out.println("Input 2 untuk menambahkan data baru");
            System.out.println("Input 3 untuk mengubah data yang sudah ada");
            System.out.println("Input 4 untuk menghapus data baru");
            System.out.println("ketik 5 untuk mencari data yang sudah ada");
            System.out.println("ketik 6 untuk Berhenti");
            
            System.out.print("Masukkan inputan Pilihan produk yang ingin dicarii: ");
            Pilihan = Scan.next();

            if (Pilihan.equals("1")) { // Untuk menampilkan data
                
                if (Data.isEmpty()) {
                    System.out.println("Kosong bang");
                }else{
                    System.out.println("\nDaftar Produk di Petshop:");
                    System.out.println("||========================||");

                    for(int i = 0; i < Data.size(); i++){
                        System.out.println("Pilihan Product    : " + Data.get(i).getID());
                        System.out.println("Nama Product  : " + Data.get(i).getNama_product());
                        System.out.println("Jenis         : " + Data.get(i).getKategori_product());
                        System.out.println("Harga         : Rp " + Data.get(i).getHarga_product());
                        System.out.println("||========================||");

                    }
                }
                
            }else if (Pilihan.equals("2")) { // Menambahkan data baru
                
                System.out.print("Masukkan Pilihan ID baru : ");
                String TempID = Scan.next();

                System.out.print("Masukkan Nama baru : ");
                String nama = Scan.next();

                System.out.print("Masukkan Kategori baru : ");
                String kategori = Scan.next();

                System.out.print("Masukkan Harga baru : ");
                int harga = Scan.nextInt();       
                
                Petshop Temp = new Petshop(TempID, nama, kategori, harga);

                Data.add(Temp);
                

            }else if (Pilihan.equals("3")) { // Mengubah data yang sudah ada
                
                System.out.println("Masukan ID yang ingin diubah");
                String Cari = Scan.next();
                boolean KetemuTimdak = false;
    
                int i = 0;
        
                while (!KetemuTimdak && i < Data.size()) {
                    if (Cari.equals(Data.get(i).getID())) {
                        KetemuTimdak = true;
                        System.out.print("Masukkan Nama baru : ");
                        String Temp = Scan.next();
                        Data.get(i).setNama_product(Temp);
        
                        System.out.print("Masukkan Kategori baru : ");
                        Temp = Scan.next();
                        Data.get(i).setKategori_product(Temp);
        
                        System.out.print("Masukkan Harga baru : ");
                        int harga = Scan.nextInt();  
                        Data.get(i).setHarga_product(harga);
                    }
                }

            }else if (Pilihan.equals("4")) { // menghapus data baru
                
                System.out.println("Masukan ID yang ingin dihapus");
                String Cari = Scan.next();
                boolean KetemuTimdak = false;
                int i = 0;
                while (!KetemuTimdak && i < Data.size()) {
                    if (Cari.equals(Data.get(i).getID())) {
                        KetemuTimdak = true;
                        Data.remove(i);
                    }else{
                        i++;
                    }
                }

                if (!KetemuTimdak) {
                    System.out.println("Tidak Ketemu");
                }else{
                    System.out.println("Berhasil dihapus");
                }


            }else if (Pilihan.equals("5")) { // mencari data baru

                System.out.println("Masukan ID yang ingin dicari");
                String Cari = Scan.next();
                boolean KetemuTimdak = false;
                int i = 0;
                while (!KetemuTimdak && i < Data.size()) {
                    if (Cari.equals(Data.get(i).getID())) {
                        KetemuTimdak = true;
                    }else{
                        i++;
                    }
                }

                if (!KetemuTimdak) {
                    System.out.println("Tidak Ketemu");
                    
                }else{
                    Data.get(i).Ingfo();
                }

                
            }else if (Pilihan.equals("6")) { // Exit

                System.out.println("Terimakasih sudah menggunakan Java Ajam");
            }else{

                System.out.println("Syntax anda Error!!!");
            }

        }while(!Pilihan.equals("6"));

        Scan.close();
        

    }
}
