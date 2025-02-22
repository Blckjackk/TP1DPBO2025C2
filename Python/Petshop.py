class Petshop:

    def __init__(self, ID, Nama, Kategori, Harga):
        self.ID = ID
        self.Nama = Nama
        self.Kategori = Kategori
        self.Harga = Harga
        

    def setID(self, ID):
        self.ID = ID

    def setNama(self, Nama):
        self.Nama = Nama

    def setKategori(self, Kategori):
        self.Kategori = Kategori

    def setHarga(self, Harga):
        self.Harga = Harga

    def getID(self):
        return self.ID

    def getNama(self):
        return self.Nama

    def getKategori(self):
        return self.Kategori

    def getHarga(self):
        return self.Harga

    
    def Infoo():
        print("ID          : {ID}\n")
        print("Nama        : {Nama}\n"  )
        print("Kategori    : {Kategori}\n" )
        print("Harga       : {Harga}\n" )
