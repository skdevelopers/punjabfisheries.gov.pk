<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Preview</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .prose {
            max-width: none;
        }
        .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
            margin-top: 1.5em;
            margin-bottom: 0.5em;
            font-weight: 600;
        }
        .prose p {
            margin-bottom: 1em;
            line-height: 1.7;
        }
        .prose ul, .prose ol {
            margin-bottom: 1em;
            padding-left: 1.5em;
        }
        .prose li {
            margin-bottom: 0.5em;
        }
        .prose img {
            max-width: 100%;
            height: auto;
            margin: 1em 0;
            border-radius: 0.5rem;
        }
        .prose a {
            color: #3b82f6;
            text-decoration: underline;
        }
        .prose a:hover {
            color: #1d4ed8;
        }
        .prose blockquote {
            border-left: 4px solid #e5e7eb;
            padding-left: 1em;
            margin: 1em 0;
            font-style: italic;
            color: #6b7280;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b">
            <div class="max-w-4xl mx-auto px-4 py-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-semibold text-gray-900">Blog Post Preview</h1>
                    <button onclick="window.close()" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                        Close Preview
                    </button>
                </div>
            </div>
        </header>

        <!-- Preview Content -->
        <main class="max-w-4xl mx-auto px-4 py-8">
            <div id="previewContent" class="bg-white rounded-lg shadow-sm p-8">
                <div class="text-center text-gray-500">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="mt-2">Loading preview...</p>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const previewData = localStorage.getItem('blogPreview');
            
            if (previewData) {
                const data = JSON.parse(previewData);
                displayPreview(data);
            } else {
                document.getElementById('previewContent').innerHTML = `
                    <div class="text-center text-gray-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <p class="mt-2">No preview data available</p>
                        <p class="text-sm">Please go back to the editor and click Preview again</p>
                    </div>
                `;
            }
        });

        function displayPreview(data) {
            const previewContent = document.getElementById('previewContent');
            
            let categoryName = '';
            let tagNames = [];
            
            // Get category name
            if (data.category) {
                const categories = @json(\App\Models\BlogCategory::all());
                const category = categories.find(c => c.id == data.category);
                if (category) {
                    categoryName = category.name;
                }
            }
            
            // Get tag names
            if (data.tags && data.tags.length > 0) {
                const tags = @json(\App\Models\BlogTag::all());
                tagNames = data.tags.map(tagId => {
                    const tag = tags.find(t => t.id == tagId);
                    return tag ? tag.name : '';
                }).filter(name => name);
            }

            previewContent.innerHTML = `
                <article class="prose prose-lg max-w-none">
                    ${data.banner_image ? `
                        <div class="mb-8">
                            <img src="${data.banner_image}" alt="Banner" class="w-full h-64 object-cover rounded-lg">
                        </div>
                    ` : ''}
                    
                    <header class="mb-8">
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">${data.title || 'Untitled Post'}</h1>
                        
                        ${data.excerpt ? `
                            <p class="text-xl text-gray-600 mb-4">${data.excerpt}</p>
                        ` : ''}
                        
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span>By Admin</span>
                            <span>•</span>
                            <span>${new Date().toLocaleDateString()}</span>
                            ${categoryName ? `
                                <span>•</span>
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full">${categoryName}</span>
                            ` : ''}
                        </div>
                        
                        ${tagNames.length > 0 ? `
                            <div class="mt-4 flex flex-wrap gap-2">
                                ${tagNames.map(tag => `
                                    <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">${tag}</span>
                                `).join('')}
                            </div>
                        ` : ''}
                    </header>
                    
                    ${data.featured_image ? `
                        <div class="mb-8">
                            <img src="${data.featured_image}" alt="Featured" class="w-full max-w-2xl mx-auto rounded-lg">
                        </div>
                    ` : ''}
                    
                    <div class="content">
                        ${data.content || '<p>No content available</p>'}
                    </div>
                    
                    <footer class="mt-12 pt-8 border-t border-gray-200">
                        <div class="text-sm text-gray-500">
                            <p><strong>Meta Title:</strong> ${data.meta_title || 'Not set'}</p>
                            <p><strong>Meta Description:</strong> ${data.meta_description || 'Not set'}</p>
                            <p><strong>Meta Keywords:</strong> ${data.meta_keywords || 'Not set'}</p>
                        </div>
                    </footer>
                </article>
            `;
        }
    </script>
</body>
</html>
