import os
from flask import Flask,jsonify,request
from flask_cors import CORS
import google.generativeai as genai
import json

app = Flask(__name__)
CORS(app)
app.secret_key = 'aodoakdwoakdak'
app.config['UPLOAD_FOLDER'] = 'uploads'

@app.route('/generate',methods=['POST'])
def generate():
    try:
        file = request.files['file']
        filename = file.filename
        file_path = os.path.join(app.config['UPLOAD_FOLDER'], filename)
        file.save(file_path)

        genai.configure(api_key=os.getenv('API_KEY'))

        model  = genai.GenerativeModel('gemini-1.5-flash',generation_config={"response_mime_type": "application/json"})

        file = genai.upload_file(path=file_path,display_name=filename)
        prompt = """ coba roasting foto tersebut dengan bahasa gaul yang agak pedas sebanyak 50 kata """
        response = model.generate_content([file,prompt])
        os.remove(file_path)
        response_data = json.loads(response.text)
        result = ""
        if 'roasts' in response_data:
            data = response_data['roasts']
            result = ', '.join(data)
        else:
            result = response_data.get('roasting') or []
        print(result)
        
        return jsonify({
            "status" : True,
            "result" : result,
            }), 200
    except:
        return jsonify({"status" : False,
                        "result" : "terjadi kesalahan atau tidak ada foto yang diupload"
                        }), 400
        
if __name__ == '__main__':
    app.run(debug=True,port=8000)
    
    